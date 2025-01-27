<!--**********************************
            Sidebar start
        ***********************************-->
	
        <div class="deznav" style="background-color: #049DB9  !important;">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">

					<li><a href="{{ route('dashboard.index') }}" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-home-2"></i>
						<span class="nav-text">Dashboard</span>
						</a>
					</li>

					<li><a href="{{ route('data.index') }}" class="ai-icon" aria-expanded="false">
						<i class="fa fa-users"></i>
						<span class="nav-text">Data Penduduk</span>
						</a>
					</li>

					<li><a href="{{ route('data.klasifikasi') }}" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-database"></i>
						<span class="nav-text">Klasifikasi</span>
						</a>
					</li>
					
					<li><a href="{{ route('report.index') }}" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-print-1"></i>
						<span class="nav-text">Report</span>
						</a>
					</li>
					

					<li>
						<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-exit-2"></i>
							<span class="nav-text">Logout</span>
						</a>
					</li>

                </ul>
				
			</div>
        </div>

        <!--**********************************
            Sidebar end
        ***********************************-->

		<!-- Logout Form -->
<<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>