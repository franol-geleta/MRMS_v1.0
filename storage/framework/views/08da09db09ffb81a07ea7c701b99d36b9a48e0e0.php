<?php $__env->startSection('myPageTitle', 'ይግቡ | Sign In'); ?>
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
				
				<form class="login100-form validate-form" action="<?php echo e(route ('setting.users.validate')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<?php echo e(method_field ('POST')); ?>

					<span class="login100-form-title">
						<?php echo e(__('Sign In Here')); ?>

					</span>
					<span class="login100-title">
						<!--	NOTIFICATION MESSAGE	    -->
						<?php if(Session::get('JoshKiyakoo_Error')): ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?php echo html_entity_decode (Session::get('JoshKiyakoo_Error')); ?>

								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif; ?>
					</span>
					<div class="wrap-input100 validate-input" data-validate = "*** Valid email is required...">
						<input type="text" name="email" class="input100 form-control"  value="<?php echo e(old('lgnUsername')); ?>" autocomplete="lgnUsername" autofocus>
						<span class="focus-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "*** Password is required...">
						<input type="password" name="password" class="input100 form-control"  autocomplete="current-password">
						<span class="focus-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><?php echo e(__('Sign In')); ?></button>
					</div>
                    <br />
					<div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chkRememberMe" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
                                <a style="font-weight: bold;">
                                    <strong>
										<label class="form-check-label" style="font-weight: bolder;" for="remember"><?php echo e(__('Remember Me')); ?></label>
									</strong>
                                </a>
                            </div>
                        </div>
                    </div>
					<hr /><br />
					<div class="text-center">
						<strong>
                            <span class="txt1"><?php echo e(__('Click the provided link here if you Forgot your ')); ?></span>
								<a class="txt2" href="#">
									<label style="font-weight: bolder;"><?php echo e(__('PASSWORD')); ?></label>
								</a>
                        </strong>
						<?php if(Route::has('password.request')): ?>
                            <a class="btn btn-link" href="#">
                            	<?php echo e(__('Forgot Your Password?')); ?>

                            </a>
                        <?php endif; ?>
                    </div>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsLoginLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/signin.blade.php ENDPATH**/ ?>