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
				
				<form class="login100-form validate-form" action="#" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<span class="login100-form-title">
						<?php echo e(__('Sign In Here')); ?>

					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: user@domain.abc">
						<input type="text" name="lgnUsername" class="input100 form-control <?php $__errorArgs = ['lgnUsername'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('lgnUsername')); ?>" required autocomplete="lgnUsername" autofocus>
						<span class="focus-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input type="password" name="lgnPassword" class="input100 form-control <?php $__errorArgs = ['lgnPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="current-password">
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
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
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

<?php echo $__env->make('layouts.mrmsLoginLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/login.blade.php ENDPATH**/ ?>