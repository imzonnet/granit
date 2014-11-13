<aside id="sidebar" class="cell-4">

    <div class="prefix_1_2">
        <?php $type = ($type == 'News') ? 'post' : 'page' ?>
        @if ($type == 'post' || $post->type == 'post')
            <!-- BEGIN CUSTOM MENU WIDGET -->
            <div class="widget custom-menu-widget">
                <h3 class="widget-head">Recent {{ Str::plural('post') }}:</h3>
                <div class="widget-content">
                    <ul>
                        @foreach (Post::type('post')->target('public')->published()->recent()->take(5)->get(array('title', 'permalink')) as $post)
                            <li>
                                {{ HTML::link(url('posts/'.$post->permalink), $post->title) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="widget custom-menu-widget">
                <h3 class="widget-head">{{ $type }} Categories</h3>
                <div class="widget-content">
                    <ul>
                        @foreach (Category::type($type)->published()->get() as $category)
                            <li>
                                {{ HTML::link(url('posts/category/'.$category->alias), $category->name) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END WIDGET -->
        @else
            <div class="widget custom-menu-widget">
                <h3 class="widget-head">Main Menu</h3>
                <div class="widget-content">
                    <ul class="list list-ok alt">
                        <li><a href="#">Corporate news</a><span>[12]</span></li>
                        <li><a href="#">Information technology</a><span>[5]</span></li>
                        <li><a href="#">Web development</a><span>[3]</span></li>
                        <li><a href="#">Sports News</a><span>[25]</span></li>
                    </ul>
                </div>
            </div>
        @endif

    </div>

</aside>
