<?php

namespace Components\Memorials\Models;

use App,
    Input,
    Post,
    Redirect,
    Request,
    Sentry,
    Str,
    View,
    File;
use Robbo\Presenter\PresentableInterface;
use Components\Memorials\Presenters\MediaPresenter;

class Media extends \Eloquent implements PresentableInterface {

    protected $table = 'granit_memorial_media';
    protected $fillable = array('title', 'media_type', 'image', 'url', 'memorial_id', 'created_by');
    protected $guarded = array('id');

    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\MediaValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;
        if( $attributes['media_type'] == 'video' && isset($attributes['url']) ) {
            $attributes['image'] = self::getThumbnail($attributes['url']);
        } else {
            $attributes['url'] = $attributes['image'];
        }
        return parent::create($attributes);
    }

    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\MediaValidator')->validateForUpdate($attributes);
        $attributes['created_by'] = current_user()->id;
        if( $attributes['media_type'] == 'video' && isset($attributes['url']) ) {
            $attributes['image'] = self::getThumbnail($attributes['url']);
        }
        return parent::update($attributes);
    }

    /**
     * Get list media type
     * @return array
     */
    public function scopeType() {
        return [
            'image' => 'Image',
            'video' => 'Video'
        ];
    }

    /**
     * Get thumbnail Video Youtube, Vimeo
     * @return string
     */
    public static function getThumbnail($url) {
        if (self::_is_youtube($url)) {
            $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
            preg_match($pattern, $url, $res);
            if (count($res) && strlen($res[1]) == 11) {
                return self::_youtube_thumbnail($res[1]);
            } else {
                return '';
            }
        } elseif (self::_is_vimeo($url)) {
            $pattern = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            preg_match($pattern, $url, $matches);
            if (count($matches)) {
                return self::_vimeo_thumbnail($matches[2]);
            }
        }
    }

    //check is youtube server
    public static function _is_youtube($url) {
        return (preg_match('/youtu\.be/i', $url) || preg_match('/youtube\.com\/watch/i', $url));
    }

    //check is vimeo server
    public static function _is_vimeo($url) {
        return (preg_match('/vimeo\.com/i', $url));
    }

    //get youtube thumbnail
    public static function _youtube_thumbnail($id) {
        return 'http://i1.ytimg.com/vi/' . $id . '/hqdefault.jpg';
    }

    //get vimeo thumbnail
    public static function _vimeo_thumbnail($id) {
        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
        return $hash[0]['thumbnail_medium'];
    }

    /**
     * Implement presenter
     */
    public function getPresenter() {
        return new MediaPresenter($this);
    }

}
