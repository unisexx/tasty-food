<div>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link {{ Request::segment(2) == 'profile' ? 'active' : '' }}" href="{{ url('member/profile') }}">ข้อมูลสำหรับการจัดส่ง</a>
		</li>
		<li class="nav-item"> {{ Request::segment(2) == 'order' ? 'active' : '' }}
			<a class="nav-link" href="{{ url('member/order') }}">สถานะการสั่งซื้อ</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Request::segment(2) == 'password' ? 'active' : '' }}" href="{{ url('member/password') }}">เปลี่ยนรหัสผ่าน</a>
		</li>
	</ul>
<div>
