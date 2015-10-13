<div class="widget menu-categories fx animated fadeInLeft">
    <h3 class="widget-head">{{trans('Products::cms.categories')}}</h3>
    <div class="widget-content">
        {{$menu_product_categories}}
    </div> 
</div>
<div class="widget menu-categories fx animated fadeInLeft">
    <h3 class="widget-head">{{trans('Products::cms.accessories')}}</h3>
    <div class="widget-content">
        {{$menu_icon_categories}}
    </div> 
</div>

{{ region_render('sidebar') }}
