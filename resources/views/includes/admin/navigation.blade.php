
		<div class="sidebar">
			<div class="sidebar-inner">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">Admin</span>
        </div>
        <ul class="nav-links">
          <li>
            <a href="{{route('dashboard.index')}}" class="active">
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
          @can('product_index')
          <li>
            <a href="{{route('product.index')}}">
              <i class='bx bx-box' ></i>
              <span class="links_name">Product</span>
            </a>
          </li>
          @endcan
          <li>
            <a href="#">
              <i class='bx bx-list-ul' ></i>
              <span class="links_name">Order list</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-pie-chart-alt-2' ></i>
              <span class="links_name">Analytics</span>
            </a>
          </li>
          <li class="catalog">
            <a href="#">
              <i class='bx bx-coin-stack' ></i>
              <span class="links_name">Catalog</span>
            </a>
              <ul class="manage-catalog">
                   @can('category_index')
                    <li>
                      <a href="{{route('category.index')}}"><ion-icon name="navigate-circle-outline"></ion-icon>Category</a>
                    </li>
                    @endcan
                    @can('product_index')
                    <li>
                      <a href="{{route('product.index')}}"><i class='bx bx-box' ></i>Product</a>
                    </li>
                    @endcan
              </ul>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-book-alt' ></i>
              <span class="links_name">Total order</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-user' ></i>
              <span class="links_name">Team</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-message' ></i>
              <span class="links_name">Messages</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-heart' ></i>
              <span class="links_name">Favrorites</span>
            </a>
          </li>
          <!-- <li>
            <a href="#">
              <i class='bx bx-cog' ></i>
              <span class="links_name">Setting</span>
            </a>
          </li>
          <li >
            <a href="#">
              <i class='bx bx-log-out'></i>
              <span class="links_name">Log out</span>
            </a>
          </li> -->
          @can('user_index')
          <li>
            <a href="{{route('user.index')}}">
              <i class='bx bx-cog' ></i>
              <span class="links_name">Manage-User</span>
            </a>
          </li>
          @endcan
          <li class="manage_permissions">
            <a href="#">
              <i class='bx bx-coin-stack' ></i>
              <span class="links_name">Manage Permissions</span>
            </a>
              <ul class="permission">
                    @can('permission_index')
                    <li>
                      <a href="{{route('permission.index')}}"><ion-icon name="navigate-circle-outline"></ion-icon>Permission</a>
                    </li>
                   @endcan
                   @can('role_index')
                    <li>
                      <a href="{{route('role.index')}}"><i class='bx bx-box' ></i>Role</a>
                    </li>
                  @endcan
              </ul>
          </li>
          
          
         
          <li class="manage_permissions">
            <a href="#">
            
            <i class="fa fa-pen"></i>
             
              <span class="links_name">Content Writting</span>
            </a>
              <ul class="permission">
                    @can('page_index')
                    <li>
                      <a href="{{route('page.index')}}"><i class="fa fa-file"></i>Pages</a>
                    </li>
                    @endcan
               
                 
                    @can('slider_index')<li>
                      <a href="{{route('slider.index')}}">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 416c0-17.7 14.3-32 32-32l54.7 0c12.3-28.3 40.5-48 73.3-48s61 19.7 73.3 48L480 384c17.7 0 32 14.3 32 32s-14.3 32-32 32l-246.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 448c-17.7 0-32-14.3-32-32zm192 0c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zM384 256c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm-32-80c32.8 0 61 19.7 73.3 48l54.7 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-54.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l246.7 0c12.3-28.3 40.5-48 73.3-48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32s-14.3-32-32-32zm73.3 0L480 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l-214.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 128C14.3 128 0 113.7 0 96S14.3 64 32 64l86.7 0C131 35.7 159.2 16 192 16s61 19.7 73.3 48z"/></svg>
                     
                      sliders</a>
                    </li>@endcan
                    @can('block_index')
                    <li>
                      <a href="{{route('block.index')}}">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z"/></svg>
                      
                      Blocks</a>
                    </li>
                    @endcan
                 
              </ul>
          </li>
          
        </ul>
      </div>
		</div>

    <script>
          $(document).ready(function(){
            $(".catalog").click(function(){
              $(".manage-catalog").toggleClass('catalogli');
            });
          });
          $(document).ready(function(){
            $(".manage_permissions").click(function(){
              $(".permission").toggleClass('permissionli');
            });
          });
      </script>

