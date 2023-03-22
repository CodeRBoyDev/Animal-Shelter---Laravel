<a href="#" class="brand-link">
    
      <span class="nav-icon fas fa-paw" class="brand-text font-weight-light"> PET SOCIETY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{ Route('employee.profile') }}" class="d-block"><h4>&#160;	&#160;
            <i class="fas fa-user-tie">	&#160;</i>{{$employee->employee_name}}</h4></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item"> 
            <a href="{{ Route('adoption.index') }}" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                Adoptable Animal
              </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ Route('animal.index') }}" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                ANIMAL
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ Route('contact.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i> 
              <p>
                INBOX
              </p>
            </a>
            </li>
          <li class="nav-item">
            <a href="{{ Route('rescuer.index') }}" class="nav-link">
              <i class="nav-icon fa fa-medkit"></i>
              <p>
                RESCUER
              </p>
            </a>
          </li>
          @if($employee->employee_type == 'admin')
          <li class="nav-item">
            <a href="{{ Route('employee.index') }}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                EMPLOYEE
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ Route('adopter.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                ADOPTER
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>
               ILLNESS
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('injury.index') }}" class="nav-link"> <i class=""></i>
                  <i class="fas fa-crutch nav-icon"></i>
                  <p>INJURY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('disease.index') }}" class="nav-link">
                  <i class="fas fa-disease nav-icon"></i> 
                  <p>DISEASE</p>
                </a>
              </li>
            </ul>
          </li>

          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>