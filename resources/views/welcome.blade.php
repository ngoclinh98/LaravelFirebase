<!DOCTYPE html>
<html>
<head>
    <title>Laravel Firebase</title>
</head>
<body>
	<div>
		<center><h1 style="color: rgb(100, 255, 100);">Laravel Connect Firebase Realtime Database</h1></center>
	</div>
	@if(isset($sv) && !empty($sv))
		<?php $i=1 ?>
		<div>
			<center><table border="1" style="text-align: center;">
				<tr><td>STT</td><td>MSSV</td><td>Họ tên</td><td>Năm Sinh</td><td colspan="2">Chức năng</td></tr>
				@foreach($sv as $key => $value)
					@if(empty($value))
						@continue
					@endif
					<tr><td>{{$i}}</td><td>B{{$key}}</td>
					@foreach($value as $key2 => $value2)
						<td>{{$value2}}</td>
					@endforeach
			    		<td><a href="{{route('delete',['id' => $key])}}">Xóa</a></td>
					</tr>
					<?php $i++ ?>
				@endforeach
			</table></center>
		</div>
	@endif
	<div>
		<table style="width: 100%; text-align: center;">
	    	<tr><td><h3>Thêm sinh viên</h3></td><tr>
	    	<form action="{{route('add')}}">
	    		<tr><td>Họ tên: <input type="text" name="hoTen" required="required" placeholder="Tên sinh viên"></td><tr>
	    		<br><br>
	    		<tr><td>Năm sinh: <input type="date" name="namSinh" required="required"></td><tr>
	    		<br><br>
	    		<tr><td><input type="submit" name="themSinhVien" value="Thêm"></td><tr>
	    	</form>
		</table>
		@if(isset($sv) && !empty($sv))
			<table style="width: 100%; text-align: center;">
		    	<tr><td><h3>Cập nhật sinh viên</h3></td><tr>
		    	<form action="{{route('update')}}">
		    		<tr><td>Chọn MSSV: <select name="id" onchange="load(this)" >
		    			<option value="0">0</option>
		    			@foreach($sv as $key => $value)
			    			@if(empty($value))
								@continue
							@endif
							@if(isset($id) && $id == $key)
		    					<option value="{{$key}}" selected="selected">B{{$key}}</option>
		    				@else
		    					<option value="{{$key}}">B{{$key}}</option>
		    				@endif
		    			@endforeach
		    		</select></td><tr>
		    		@if(isset($loadUpdate))
		    			<?php 
		    				$NamSinh = null;
		    				$HoTen = null;
		    			?> 
		    			@foreach($loadUpdate as $key => $value)
		    				@if($key == "NamSinh")
		    					<?php $NamSinh = $value ?>
		    				@else
		    					<?php $HoTen = $value ?>
		    				@endif

				    	@endforeach
				    		<tr><td>Họ tên: <input type="text" name="hoTen" required="required" value="{{$HoTen}}"></td><tr>
				    		<br><br>
				    		<tr><td>Năm sinh: <input type="date" name="namSinh" required="required" value="{{$NamSinh}}"></td><tr>
				    		<br><br>
				    		<tr><td><input type="submit" name="capNhatSinhVien" value="Cập nhật"></td><tr>
			    	@else
			    		<tr><td>Họ tên: <input type="text" name="hoTen" required="required" placeholder="Tên sinh viên"></td><tr>
			    		<br><br>
			    		<tr><td>Năm sinh: <input type="date" name="namSinh" required="required"></td><tr>
			    		<br><br>
			    		<tr><td><input type="submit" name="capNhatSinhVien" value="Cập nhật"></td><tr>
		    		@endif
		    	</form>
			</table>
		@endif
	</div>
	<script type="text/javascript">
		function load(sl) {
			window.location = "http://bookshop.local/loadUpdate/"+sl.value;
		}
	</script>
</body>
</html>