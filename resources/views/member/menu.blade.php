<div>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link {{ Request::segment(2) == 'profile' || Request::segment(2) == 'profile_form' ? 'active' : '' }}" href="{{ url('member/profile') }}">ข้อมูลสำหรับการจัดส่ง</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Request::segment(2) == 'order' ? 'active' : '' }}" href="{{ url('member/order') }}">สถานะการสั่งซื้อ</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Request::segment(2) == 'password' ? 'active' : '' }}" href="{{ url('member/password') }}">เปลี่ยนรหัสผ่าน</a>
		</li>
	</ul>
<div>
