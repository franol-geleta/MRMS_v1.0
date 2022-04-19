<?php $__env->startSection('myPageTitle', 'እንኳን ደህና መጡ | Welcome'); ?>
<?php $__env->startSection('LoginContent'); ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <span class="login100-form-title">
                    <label style="font-weight: bolder; color: #066fc2;"><?php echo e(__('የሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን')); ?></label><br />
                    <label style="font-weight: bolder; color: #c92f2f;"><?php echo e(__('የአባላት ምዝገባ እና መቆጣጠሪያ ሥርዓት')); ?></label><br /><br />
                    <label style="color: #066fc2;"><?php echo e(__('Semien Full Gospel Local Church')); ?></label><br />
                    <label style="color: #c92f2f;"><?php echo e(__('Members\' Registration & Management System')); ?></label><hr />
                </span>
				<div class="login100-pic js-tilt" data-tilt>
					<a href="https://semienfgbc.org">
						<img src="<?php echo e(asset ('public/icon/FGBC_Fav_Icon.png')); ?>" alt="SFGLC_LOGO">
					</a>
				</div>
				
				<form class="login100-form validate-form" action="<?php echo e(route ('dashboard')); ?>" method="GET" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					
					<span class="login100-form-title">
						<strong><?php echo e(__('ወደ ሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን የአባላት ምዝገባ እና መቆጣጠሪያ ሥርዓት እንኳን ደህና መጡ...')); ?></strong>
					</span>
					
					<span class="login100-form-title">
						<?php echo e(__('Welcome to Semien Full Gospel Local Church Members\'s Registration and Management System...')); ?>

					</span>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><?php echo e(__('ይቀጥሉ || PROCEED')); ?></button>
					</div>
					<br /><br />
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsLoginLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/welcome.blade.php ENDPATH**/ ?>