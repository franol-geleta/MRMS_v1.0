<?php
// ======================================================================
//             Designed by:    Eyasu Girma [Kiya]
//                 Mobile:     +251-913-078-029
//                 Email:      sendtokiya@gmail.com
//                 Facebook:   https://facebook.com/JoshKiyakoo
//                 LinkedIn:   https://linkedin.com/in/JoshKiyakoo
//                 Twitter:    https://twitter.com/JoshKiyakoo
//                 GitHub:     https://github.com/JoshKiyakoo
//                 Telegram:   https://t.me/JoshKiyakoo
// ======================================================================
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Defined Controllers
|--------------------------------------------------------------------------
| Here is where you can call your @Controllers
|*/

use App\Http\Controllers\DashboardDataController;

use App\Http\Controllers\Members\MembersDataController;
use App\Http\Controllers\Members\ServiceSectorDataController;
use App\Http\Controllers\Members\FamilyMemberDataController;
use App\Http\Controllers\Members\EducationLevelDataController;
use App\Http\Controllers\Members\FellowshipDataController;
use App\Http\Controllers\Members\WorkExperienceDataController;
use App\Http\Controllers\Members\MembershipDataController;
use App\Http\Controllers\Members\DeactivateDataController;
use App\Http\Controllers\Members\ResidentialAddressDataController;

use App\Http\Controllers\Fellowships\FellowshipsDataController;
use App\Http\Controllers\Fellowships\AttendanceDataController;
use App\Http\Controllers\Fellowships\ActivityDataController;

use App\Http\Controllers\ServiceSectors\ServiceSectorsDataController;

use App\Http\Controllers\Settings\ChurchOrganizationDataController;
use App\Http\Controllers\Settings\SystemVariableDataController;

use App\Http\Controllers\Settings\Users\ManageAccountDataController;
use App\Http\Controllers\Settings\Users\SignUpDataController;
use App\Http\Controllers\Settings\Users\SignInDataController;
use App\Http\Controllers\Settings\Users\SignOutDataController;
use App\Http\Controllers\Settings\Users\ChangePasswordDataController;
use App\Http\Controllers\Settings\Users\RecoverUserDataController;

// use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// require __DIR__.'/auth.php';

// Auth::routes();
//Responds to request -> https://mrms.semienfgbc.org/
Route::get('/', function () {
    return view('welcome');
});

// Responds to request -> https://mrms.semienfgbc.org/login
Route::get('/signin', function () {
    return view('signin');
})->name('signin');

//Responds to request -> https://mrms.semienfgbc.org/dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Members' Data Cabine Route Group
//Responds to request -> https://mrms.semienfgbc.org/members
Route::prefix('members')->as('members.')->group(function () {
    // Members' Personal Data
    Route::get('/', [MembersDataController::class, 'index'])->middleware(['auth'])->name('index');
    Route::get('/create', [MembersDataController::class, 'createMember'])->middleware(['auth'])->name('create');
    Route::post('/store', [MembersDataController::class, 'storeMember'])->middleware(['auth'])->name('store');
    Route::get('/edit/{idMember}', [MembersDataController::class, 'editMember'])->middleware(['auth'])->name('edit');
    Route::get('/show/{idMember}', [MembersDataController::class, 'showMember'])->middleware(['auth'])->name('show');
    Route::put('/update/{idMember}', [MembersDataController::class, 'updateMember'])->middleware(['auth'])->name('update');
    Route::get('/avatar', [MembersDataController::class, 'showAvatar'])->middleware(['auth'])->name('avatar');
    Route::get('/staffmember', [MembersDataController::class, 'showStaffMember'])->middleware(['auth'])->name('staffmember');
    Route::put('/remove/{idMember}', [MembersDataController::class, 'destroyMember'])->middleware(['auth'])->name('remove');
    
    // Members' Data Exporting
    Route::get('/topdf', [MembersDataController::class, 'downloadPDF'])->middleware(['auth'])->name('topdf');
    Route::get('/toexcel', [MembersDataController::class, 'downloadEXCEL'])->middleware(['auth'])->name('toexcel');
    Route::get('/tocsv', [MembersDataController::class, 'downloadCSV'])->middleware(['auth'])->name('tocsv');
    // Route::get('/autocomplete', [MembersDataController::class, 'autocomplete'])->middleware(['auth'])->name('autocomplete');

    // Members' Deactivation Data
    Route::get('/deactivate/{idMember}', [DeactivateDataController::class, 'deactivateMember'])->middleware(['auth'])->name('deactivate');
    Route::put('/transfer/{idMember}', [DeactivateDataController::class, 'addTransferMember'])->middleware(['auth'])->name('transfer');
    Route::put('/decease/{idMember}', [DeactivateDataController::class, 'addDeceaseMember'])->middleware(['auth'])->name('decease');
    Route::post('/deactivated/{idMember}', [DeactivateDataController::class, 'deactivatedMember'])->middleware(['auth'])->name('deactivated');
    Route::put('/etransfer/{idMember}', [DeactivateDataController::class, 'editTransferMember'])->middleware(['auth'])->name('etransfer');
    Route::put('/edecease/{idMember}', [DeactivateDataController::class, 'editDeceaseMember'])->middleware(['auth'])->name('edecease');
    Route::get('/transfered', [DeactivateDataController::class, 'viewTransferedMember'])->middleware(['auth'])->name('transfered');
    Route::get('/deceased', [DeactivateDataController::class, 'viewDeceasedMember'])->middleware(['auth'])->name('deceased');
    Route::get('/inactive', [DeactivateDataController::class, 'viewInactiveMember'])->middleware(['auth'])->name('inactive');

    // Members' Residential Address Data
    Route::prefix('/residentialaddress')->as('residentialaddress.')->group(function () {
        Route::get('/create/{idMember}', [ResidentialAddressDataController::class, 'createAddress'], )->middleware(['auth'])->name('create');
        Route::post('/store/{idMember}', [ResidentialAddressDataController::class, 'storeAddress'])->middleware(['auth'])->name('store');
        Route::get('/edit/{idAddress}', [ResidentialAddressDataController::class, 'editAddress'])->middleware(['auth'])->name('edit');
        Route::get('/show/{idAddress}', [ResidentialAddressDataController::class, 'showAddress'])->middleware(['auth'])->name('show');
        Route::put('/update/{idAddress}', [ResidentialAddressDataController::class, 'updateAddress'])->middleware(['auth'])->name('update');
    });
    // Members' Membership Data
    Route::prefix('/membership')->as('membership.')->group(function () {
        Route::get('/create/{idMember}', [MembershipDataController::class, 'createMembership'], )->middleware(['auth'])->name('create');
        Route::post('/store/{idMember}', [MembershipDataController::class, 'storeMembership'])->middleware(['auth'])->name('store');
        Route::get('/edit/{idMember}', [MembershipDataController::class, 'editMembership'])->middleware(['auth'])->name('edit');
        Route::get('/show/{idMembership}', [MembershipDataController::class, 'showMembership'])->middleware(['auth'])->name('show');
        Route::put('/update/{idMembership}', [MembershipDataController::class, 'updateMembership'])->middleware(['auth'])->name('update');
    });
    // Members' Education Level Data
    Route::prefix('/educationlevel')->as('educationlevel.')->group(function () {
        Route::get('/create/{idMember}', [EducationLevelDataController::class, 'createEducation'], )->middleware(['auth'])->name('create');
        Route::post('/store/{idMember}', [EducationLevelDataController::class, 'storeEducation'])->middleware(['auth'])->name('store');
        Route::get('/edit/{idEducation}', [EducationLevelDataController::class, 'editEducation'])->middleware(['auth'])->name('edit');
        Route::get('/show/{idEducation}', [EducationLevelDataController::class, 'showEducation'])->middleware(['auth'])->name('show');
        Route::put('/update/{idEducation}', [EducationLevelDataController::class, 'updateEducation'])->middleware(['auth'])->name('update');
        Route::delete('/remove/{idEducation}', [EducationLevelDataController::class, 'destroyEducation'])->middleware(['auth'])->name('remove'); 
    });
    // Members' Work Experience Data
    Route::prefix('/workexperience')->as('workexperience.')->group(function () {
        Route::get('/create/{idMember}', [WorkExperienceDataController::class, 'createExperience'], )->middleware(['auth'])->name('create');
        Route::post('/store/{idMember}', [WorkExperienceDataController::class, 'storeExperience'])->middleware(['auth'])->name('store');
        Route::get('/edit/{idMember}', [WorkExperienceDataController::class, 'editExperience'])->middleware(['auth'])->name('edit');
        Route::get('/show/{idExperience}', [WorkExperienceDataController::class, 'showExperience'])->middleware(['auth'])->name('show');
        Route::put('/update/{idExperience}', [WorkExperienceDataController::class, 'updateExperience'])->middleware(['auth'])->name('update');
        Route::delete('/remove/{idExperience}', [WorkExperienceDataController::class, 'destroyExperience'])->middleware(['auth'])->name('remove'); 
    });
    // Members' Family Member Data
    Route::prefix('/familymember')->as('familymember.')->group(function () {
        Route::get('/create/{idMember}', [FamilyMemberDataController::class, 'createFamily'], )->middleware(['auth'])->name('create');
        Route::post('/store/{idMember}', [FamilyMemberDataController::class, 'storeFamily'])->middleware(['auth'])->name('store');
        Route::get('/edit/{idFamilyMember}', [FamilyMemberDataController::class, 'editFamily'])->middleware(['auth'])->name('edit');
        Route::get('/show/{idFamilyMember}', [FamilyMemberDataController::class, 'showFamily'])->middleware(['auth'])->name('show');
        Route::put('/update/{idFamilyMember}', [FamilyMemberDataController::class, 'updateFamily'])->middleware(['auth'])->name('update');
        Route::delete('/remove/{idFamilyMember}', [FamilyMemberDataController::class, 'destroyFamily'])->middleware(['auth'])->name('remove'); 
    });
    // Members' Fellowship Data
    Route::prefix('/fellowship')->as('fellowship.')->group(function () {
        Route::get('/create/{idMember}', [FellowshipDataController::class, 'createFellowship'], )->middleware(['auth'])->name('create');
        Route::post('/store/{idMember}', [FellowshipDataController::class, 'storeFellowship'])->middleware(['auth'])->name('store');
        Route::get('/edit/{idFellowship}', [FellowshipDataController::class, 'editFellowship'])->middleware(['auth'])->name('edit');
        Route::get('/show/{idFellowship}', [FellowshipDataController::class, 'showFellowship'])->middleware(['auth'])->name('show');
        Route::put('/update/{idFellowship}', [FellowshipDataController::class, 'updateFellowship'])->middleware(['auth'])->name('update');
        Route::delete('/remove/{idFellowship}', [FellowshipDataController::class, 'destroyFellowship'])->middleware(['auth'])->name('remove'); 
    });
    // Members' Service Sector Data
    Route::prefix('/servicesector')->as('servicesector.')->group(function () {
        Route::get('/create/{idMember}', [ServiceSectorDataController::class, 'createSector'], )->middleware(['auth'])->name('create');
        Route::post('/store/{idMember}', [ServiceSectorDataController::class, 'storeSector'])->middleware(['auth'])->name('store');
        Route::get('/edit/{idServiceSector}', [ServiceSectorDataController::class, 'editSector'])->middleware(['auth'])->name('edit');
        Route::get('/show/{idServiceSector}', [ServiceSectorDataController::class, 'showSector'])->middleware(['auth'])->name('show');
        Route::put('/update/{idServiceSector}', [ServiceSectorDataController::class, 'updateSector'])->middleware(['auth'])->name('update');
        Route::delete('/remove/{idServiceSector}', [ServiceSectorDataController::class, 'destroySector'])->middleware(['auth'])->name('remove'); 
    });
});

// Fellowship Cabine Route Group
//Responds to request -> https://mrms.semienfgbc.org/fellowships
Route::prefix('fellowships')->as('fellowships.')->group(function () {
    Route::get('/', [FellowshipsDataController::class, 'index'])->middleware(['auth'])->name('index');
    Route::get('/create', [FellowshipsDataController::class, 'createFellowship'], )->middleware(['auth'])->name('create');
    Route::post('/store', [FellowshipsDataController::class, 'storeFellowship'])->middleware(['auth'])->name('store');
    Route::get('/edit/{idFellowship}', [FellowshipsDataController::class, 'editFellowship'])->middleware(['auth'])->name('edit');
    Route::get('/show/{idFellowship}', [FellowshipsDataController::class, 'showFellowship'])->middleware(['auth'])->name('show');
    Route::put('/update/{idFellowship}', [FellowshipsDataController::class, 'updateFellowship'])->middleware(['auth'])->name('update');
    Route::put('/remove/{idFellowship}', [FellowshipsDataController::class, 'destroyFellowship'])->middleware(['auth'])->name('remove');

    // Service Sector's Data Exporting
    Route::get('/topdf', [FellowshipsDataController::class, 'downloadPDF'])->middleware(['auth'])->name('topdf');
    Route::get('/toexcel', [FellowshipsDataController::class, 'downloadEXCEL'])->middleware(['auth'])->name('toexcel');
    Route::get('/tocsv', [FellowshipsDataController::class, 'downloadCSV'])->middleware(['auth'])->name('tocsv');
    // Route::get('/autocomplete', [MembersDataController::class, 'autocomplete'])->middleware(['auth'])->name('autocomplete');

    // Fellowships' Attendance Data
    Route::prefix('/attendance')->as('attendance.')->group(function () {
        Route::get('/attendance', [AttendanceDataController::class, 'fellowshipAttendance'])->middleware(['auth'])->name('attendance');
    });

    // Fellowships' Activity Data
    Route::prefix('/activity')->as('activity.')->group(function () {
        Route::get('/', [ActivityDataController::class, 'fellowshipActivity'])->middleware(['auth'])->name('index');
    });
});

// Service Sector Cabine Route Group
//Responds to request -> https://mrms.semienfgbc.org/servicesectors
Route::prefix('servicesectors')->as('servicesectors.')->group(function () {
    Route::get('/', [ServiceSectorsDataController::class, 'index'])->middleware(['auth'])->name('index');
    Route::get('/create', [ServiceSectorsDataController::class, 'createServiceSector'], )->middleware(['auth'])->name('create');
    Route::post('/store', [ServiceSectorsDataController::class, 'storeServiceSector'])->middleware(['auth'])->name('store');
    Route::get('/edit/{idServiceSector}', [ServiceSectorsDataController::class, 'editServiceSector'])->middleware(['auth'])->name('edit');
    Route::get('/show/{idServiceSector}', [ServiceSectorsDataController::class, 'showServiceSector'])->middleware(['auth'])->name('show');
    Route::put('/update/{idServiceSector}', [ServiceSectorsDataController::class, 'updateServiceSector'])->middleware(['auth'])->name('update');
    Route::put('/remove/{idFellowship}', [ServiceSectorsDataController::class, 'destroyFellowship'])->middleware(['auth'])->name('remove');

    // Service Sector's Data Exporting
    Route::get('/topdf', [ServiceSectorsDataController::class, 'downloadPDF'])->middleware(['auth'])->name('topdf');
    Route::get('/toexcel', [ServiceSectorsDataController::class, 'downloadEXCEL'])->middleware(['auth'])->name('toexcel');
    Route::get('/tocsv', [ServiceSectorsDataController::class, 'downloadCSV'])->middleware(['auth'])->name('tocsv');
    // Route::get('/autocomplete', [MembersDataController::class, 'autocomplete'])->middleware(['auth'])->name('autocomplete');
});

// Settings Cabine Route Group
// Responds to request -> https://mrms.semienfgbc.org/setting
Route::prefix('setting')->as('setting.')->group(function () {
    // Church's System Overviews
    Route::get('/', function () {   return view('setting.index');   })->middleware(['auth'])->name('index');
    
    // Church's Branding and Namings
    Route::prefix('/church')->as('church.')->group(function () {
        Route::get('/brandname', [ChurchOrganizationDataController::class, 'getChurchBrandName'])->middleware(['auth'])->name('getbrandname');
        Route::put('/brandname/{idChurchBrand}', [ChurchOrganizationDataController::class, 'setChurchBrandName'])->middleware(['auth'])->name('setbrandname');

        Route::get('/contactinfo', [ChurchOrganizationDataController::class, 'getChurchContactInfo'])->middleware(['auth'])->name('getcontactinfo');
        Route::put('/contactinfo/{idContactInfo}', [ChurchOrganizationDataController::class, 'setChurchContactInfo'])->middleware(['auth'])->name('setcontactinfo');

        Route::get('/websystemlink', [ChurchOrganizationDataController::class, 'getWebSystemLink'])->middleware(['auth'])->name('getwebsystemlink');
        Route::put('/websystemlink/{idWebsystemLink}', [ChurchOrganizationDataController::class, 'setWebSystemLink'])->middleware(['auth'])->name('setwebsystemlink');
        
        Route::get('/idformat', [ChurchOrganizationDataController::class, 'getIDFormat'])->middleware(['auth'])->name('getidformat');
        Route::put('/idformat', [ChurchOrganizationDataController::class, 'setIDFormat'])->middleware(['auth'])->name('setidformat');
    });

    // Church's System Variables
    Route::prefix('/systemvariable')->as('systemvariable.')->group(function () {
        Route::get('/lookupdata', [SystemVariableDataController::class, 'getLookupData'], )->middleware(['auth'])->name('getlookupdata');
        Route::get('/alookupdata', [SystemVariableDataController::class, 'addLookupData'])->middleware(['auth'])->name('alookupdata');
        Route::post('/slookupdata/{idLookupData}', [SystemVariableDataController::class, 'storeLookupData'])->middleware(['auth'])->name('slookupdata');
        Route::post('/elookupdata/{idLookupData}', [SystemVariableDataController::class, 'editLookupData'])->middleware(['auth'])->name('elookupdata');
        Route::post('/ulookupdata/{idLookupData}', [SystemVariableDataController::class, 'updateLookupData'])->middleware(['auth'])->name('ulookupdata');

        Route::get('/countrydata', [SystemVariableDataController::class, 'getCountryList'], )->middleware(['auth'])->name('getcountrydata');
        Route::get('/acountrydata', [SystemVariableDataController::class, 'addCountryList'])->middleware(['auth'])->name('acountrydata');
        Route::post('/scountrydata/{idCountryList}', [SystemVariableDataController::class, 'storeCountryList'])->middleware(['auth'])->name('scountrydata');
        Route::post('/ecountrydata/{idCountryList}', [SystemVariableDataController::class, 'editCountryList'])->middleware(['auth'])->name('ecountrydata');
        Route::post('/ucountrydata/{idCountryList}', [SystemVariableDataController::class, 'updateCountryList'])->middleware(['auth'])->name('ucountrydata');
    });

    // Church's System User Account Management
    Route::prefix('/users')->as('users.')->group(function () {
        // System User Account Data Management
        Route::get('/', [ManageAccountDataController::class, 'index'])->middleware(['auth'])->name('index');
        Route::get('/edit', [ManageAccountDataController::class, 'editUserAccount'])->middleware(['auth'])->name('edit');
        Route::get('/update', [ManageAccountDataController::class, 'updateUserAccount'])->middleware(['auth'])->name('update');
        Route::get('/remove', [ManageAccountDataController::class, 'destroyUserAccount'])->middleware(['auth'])->name('delete');

        Route::get('/signup', [SignUpDataController::class, 'createUserAccount'])->middleware(['auth'])->name('create');
        Route::post('/validate', [SignInDataController::class, 'validateUerAccount'])->name('validate');
        Route::put('/register', [SignUpDataController::class, 'storeUserAccount'])->middleware(['auth'])->name('register');
        Route::post('/signout', [SignOutDataController::class, 'closeUserAccount'])->name('logout');
        
        Route::prefix('/permission')->as('permission.')->group(function () {
            Route::get('/', [OrganizationSetupController::class, 'index'])->middleware(['auth'])->name('index');
            Route::get('/view/{idMember}', [OrganizationSetupController::class, 'viewBrandNAme'], )->middleware(['auth'])->name('brandname');
            Route::put('/modify/{idMember}', [OrganizationSetupController::class, 'modifyBrandNAme'])->middleware(['auth'])->name('brandname');
        });
        
        Route::prefix('/role')->as('role.')->group(function () {
            Route::get('/', [OrganizationSetupController::class, 'index'])->middleware(['auth'])->name('index');
            Route::get('/view/{idMember}', [OrganizationSetupController::class, 'viewBrandNAme'], )->middleware(['auth'])->name('brandname');
            Route::put('/modify/{idMember}', [OrganizationSetupController::class, 'modifyBrandNAme'])->middleware(['auth'])->name('brandname');
        });
    });

//     // Church's System Backup and Restore
//     Route::prefix('/automation')->as('automation.')->group(function () {
//         Route::get('/view/{idMember}', [OrganizationSetupController::class, 'viewBrandNAme'], )->middleware(['auth'])->name('brandname');
//         Route::put('/modify/{idMember}', [OrganizationSetupController::class, 'modifyBrandNAme'])->middleware(['auth'])->name('brandname');
//     });
});

// ################################################################################################################################

// // Testing Directory
// Route::get('/test/education', function () {
//     return view('test.education');
// })->middleware(['auth'])->name('test.education');
// Route::get('/test/family', function () {
//     return view('test.family');
// })->middleware(['auth'])->name('test.family');
// Route::get('/test/sector', function () {
//     return view('test.sector');
// })->middleware(['auth'])->name('test.sector');
// Route::get('/test/work', function () {
//     return view('test.work');
// })->middleware(['auth'])->name('test.fellowship');
// Route::get('/test/fellowship', function () {
//     return view('test.fellowship');
// })->middleware(['auth'])->name('test.fellowship');


// ################################################################################################################################
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');

// When no one is there to fix YOU, you fix YOURSELF.