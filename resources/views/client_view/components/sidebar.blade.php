<div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
    <div class="filter-widget">
        <h4 class="fw-title">Danh Mục Sản Phẩm</h4>

        <ul class="filter-catagories">
            @foreach ($categories as $category)
            <li>
                <span class="caret" href="">{{ $category['name'] }}</span>
                <ul class="nested" style="padding-left:15px ">
                    @foreach ($category->categoryChildren as $cat)
                    <li><a href="{{ route('home.category.product', ['slug'=> $cat->slug,'id' => $cat->id ]) }}" >{{ $cat['name'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check">
            <div class="bc-item">
                <label for="bc-calvin">
                    Calvin Klein
                    <input type="checkbox" id="bc-calvin">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="bc-diesel">
                    Diesel
                    <input type="checkbox" id="bc-diesel">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="bc-polo">
                    Polo
                    <input type="checkbox" id="bc-polo">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="bc-tommy">
                    Tommy Hilfiger
                    <input type="checkbox" id="bc-tommy">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount">
                    <input type="text" id="maxamount">
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                data-min="33" data-max="98">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>
        <a href="#" class="filter-btn">Filter</a>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black">
                <label class="cs-black" for="cs-black">Black</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-violet">
                <label class="cs-violet" for="cs-violet">Violet</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-blue">
                <label class="cs-blue" for="cs-blue">Blue</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-yellow">
                <label class="cs-yellow" for="cs-yellow">Yellow</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-red">
                <label class="cs-red" for="cs-red">Red</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-green">
                <label class="cs-green" for="cs-green">Green</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size">
                <label for="s-size">s</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="m-size">
                <label for="m-size">m</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size">
                <label for="l-size">l</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xs-size">
                <label for="xs-size">xs</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a href="#">Towel</a>
            <a href="#">Shoes</a>
            <a href="#">Coat</a>
            <a href="#">Dresses</a>
            <a href="#">Trousers</a>
            <a href="#">Men's hats</a>
            <a href="#">Backpack</a>
        </div>
    </div>
</div>