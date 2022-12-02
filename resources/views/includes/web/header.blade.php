<div class="continer">
    <header>
        <div class="logo">
            <img src="{{ URL('css/img/index.jpg') }}">

        </div>
        <div class="logo1">
          <!--  @foreach($categories as $_category)
                <a href="/category/{{ $_category->url_key }}">
                    {{ $_category->category_name }}
                </a>
            @endforeach -->
            
            <ul>
                @foreach($categories as $_category)
                <li class="category-main">
                
                    <a class="category-link" href="">{{$_category->category_name}}</a>
                        <ul class="category-sub">
                                <li><a href="">abc</a></li>
                                <li><a href="">abc</a></li>
                                <li><a href="">abc</a></li>
                                <li><a href="">abc</a></li>
                        </ul>
              
                </li>
                  @endforeach
               <!-- <li>def</li>
                <li>def</li>
                <li>def</li>
                <li>def</li>
                <li>def</li>-->
            </ul>
            
           

        </div>

        <div class="logo2">
            <a href="#">
                <ion-icon name="search-outline"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="cart-outline"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="heart-outline"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="person-outline"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>

    </header>
</div>
