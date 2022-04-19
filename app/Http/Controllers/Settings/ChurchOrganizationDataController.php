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
namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Settings\ChurchBrandNameDataModel;
use App\Models\Settings\ChurchWebsystemLinkDataModel;
use App\Models\Settings\ChurchContactInfoDataModel;

use App\Models\Members\MembersDataModel;

class ChurchOrganizationDataController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getChurchBrandName () {
        if (ChurchBrandNameDataModel::all()) {
            $zChurchBrandName =
                DB::table('sfgbc_Setting_BrandName')->first();
            return view ('setting.church.brandname', compact ('zChurchBrandName'));
        }
        else {
            return redirect()->route('setting.church.brandname')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span>...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setChurchBrandName (Request $requestChurchBrand, $idChurchBrand) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;

        if (is_null ($requestChurchBrand->file('fileMainLogo')) && is_null ($requestChurchBrand->file('fileFavIcon')) && is_Null ($requestChurchBrand->txtLocalChurchName_amh) && is_Null ($requestChurchBrand->txtLocalChurchName_eng) && is_Null ($requestChurchBrand->txtParentChurchName_amh) && is_Null ($requestChurchBrand->txtParentChurchName_eng) && is_Null ($requestChurchBrand->txtLocalChurchNameColor_amh) && is_Null ($requestChurchBrand->txtLocalChurchNameColor_eng) && is_Null ($requestChurchBrand->chkIsParentChurchName_Checked)) {
                $myDataEntryFlag = 0;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                if (ChurchBrandNameDataModel::find($idChurchBrand)) {
                    // Object Model Defination
                    $editChurchBrandObj = ChurchBrandNameDataModel::find($idChurchBrand);
        
                    $editChurchBrandObj->fgbLocalChurchName_amh = $requestChurchBrand->txtLocalChurchName_amh;
                    $editChurchBrandObj->fgbLocalChurchName_eng = $requestChurchBrand->txtLocalChurchName_eng;
                    $editChurchBrandObj->fgbParentChurchName_amh = $requestChurchBrand->txtParentChurchName_amh;
                    $editChurchBrandObj->fgbParentChurchName_eng = $requestChurchBrand->txtParentChurchName_eng;
                    $editChurchBrandObj->fgbLocalChurchNameColor_amh = $requestChurchBrand->txtLocalChurchNameColor_amh;
                    $editChurchBrandObj->fgbLocalChurchNameColor_eng = $requestChurchBrand->txtLocalChurchNameColor_eng;
                    $editChurchBrandObj->fgbIsParentChurchName_Checked = $requestChurchBrand->chkIsParentChurchName_Checked;
                    $editChurchBrandObj->fgbChurchSloganLabel_amh = $requestChurchBrand->txtChurchSloganLabel_amh;
                    $editChurchBrandObj->fgbChurchSloganLabel_eng = $requestChurchBrand->txtChurchSloganLabel_eng;
                    $editChurchBrandObj->fgbChurchSloganColor_amh = $requestChurchBrand->txtChurchSloganColor_amh;
                    $editChurchBrandObj->fgbChurchSloganColor_eng = $requestChurchBrand->txtChurchSloganColor_eng;
        
                    // Naming and Formating Church Brand Main Logo Location
                    $mainLogo = $requestChurchBrand->file('fileMainLogo');
                    $OldMainLogo = $requestChurchBrand->oldMainLogo;
                    
                    if (file_exists ($mainLogo)) {
                        if (is_file($OldMainLogo)) {
                            unlink ($OldMainLogo);
                        }
                        $mainLogo_Name = 'mrmsChurchBrandImage_MainLogo_'.date ('Ymd_Hsi');

                        $mainLogo_Extension = Str::lower($mainLogo->getClientOriginalExtension());
                        $mainLogo_FullChurchBrand = $mainLogo_Name.'.'.$mainLogo_Extension;
                        $mainLogo_UploadPath =  'storage/MRMS_ChurchBrandImage/';
                        $mainLogo_Location = $mainLogo_UploadPath.$mainLogo_FullChurchBrand;
                        $mainLogo->move($mainLogo_UploadPath, $mainLogo_FullChurchBrand);
                        $editChurchBrandObj->fgbMainLogo = $mainLogo_Location;
                    }
                    else {
                        $editChurchBrandObj->fgbMainLogo = $requestChurchBrand->oldMainLogo;
                    }

                    // Naming and Formating Church FavIcon Logo Location
                    $favIconLogo = $requestChurchBrand->file('fileFavIcon');
                    $OldFavIcon = $requestChurchBrand->oldFavIcon;
                    
                    if (file_exists ($favIconLogo)) {
                        if (is_file($OldFavIcon)) {
                            unlink ($OldFavIcon);
                        }
                        $favIconLogo_Name = 'mrmsChurchBrandImage_FavIcon_'.date ('Ymd_Hsi');

                        $favIconLogo_Extension = Str::lower($favIconLogo->getClientOriginalExtension());
                        $favIconLogo_FullChurchBrand = $favIconLogo_Name.'.'.$favIconLogo_Extension;
                        $favIconLogo_UploadPath =  'storage/MRMS_ChurchBrandImage/';
                        $favIconLogo_Location = $favIconLogo_UploadPath.$favIconLogo_FullChurchBrand;
                        $favIconLogo->move($favIconLogo_UploadPath, $favIconLogo_FullChurchBrand);
                        $editChurchBrandObj->fgbFavIcon = $favIconLogo_Location;
                    }
                    else {
                        $editChurchBrandObj->fgbFavIcon = $requestChurchBrand->oldFavIcon;
                    }
        
                    // Update Data on Database
                    $editChurchBrandObj->update();
        
                    return redirect()->route('setting.church.getbrandname')
                        ->with('JoshKiyakoo_Success', '
                            <div class="row">
                                <div class="col-md-10">
                                    *** Church\'s profile data for <span style="font-weight: bold; color: BLUE;"> '.
                                    $editChurchBrandObj->fgbLocalChurchName_amh.' -|- '.$editChurchBrandObj->fgbLocalChurchName_eng
                                    .'</span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                                </div>
                                <div class="col-md-2">
                                    <a class="text-right btn btn-outline-danger" href="contactaddress">Next Page</a>
                                </div>
                            </div>
                        ');
                }
                else {
                    return redirect()->route('setting.index')
                    ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Church\'s UCID '.$idChurchBrand.'...');
                }
            }
            catch (Exception $throwChurchBrand) {
                return redirect()->route('setting.index')
                    ->with ('JoshKiyakoo_Error', '*** Church\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwChurchBrand.getMessage());
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getChurchContactInfo () {
        if (ChurchContactInfoDataModel::all()) {
            $zContactAddress =
                DB::table('sfgbc_setting_ContactAddress')->first();
            return view ('setting.church.contactaddress', compact ('zContactAddress'));
        }
        else {
            return redirect()->route('setting.church.contactaddress')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span>...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setChurchContactInfo (Request $requestContactInfo, $idContactInfo) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;

        if (is_Null ($requestContactInfo->txtLandLinePhone1) && is_Null ($requestContactInfo->cmbCountry) && is_Null ($requestContactInfo->cmbProvince) && is_Null ($requestContactInfo->txtMunicipality) && is_Null ($requestContactInfo->txtWoreda) && is_Null ($requestContactInfo->txtLocationNaming) && is_Null ($requestContactInfo->cmbSubcity)) {
                $myDataEntryFlag = 0;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;"> FILLED. </span>.....');
        }
        else {
            try {
                if (ChurchContactInfoDataModel::find($idContactInfo)) {
                    // Object Model Defination
                    $editContactInfoObj = ChurchContactInfoDataModel::find($idContactInfo);
        
                    $editContactInfoObj->fgbLandLinePhone1 = $requestContactInfo->txtLandLinePhone1;
                    $editContactInfoObj->fgbLandLinePhone2 = $requestContactInfo->txtLandLinePhone2;
                    $editContactInfoObj->fgbLandLinePhone3 = $requestContactInfo->txtLandLinePhone3;
                    $editContactInfoObj->fgbMobilePhone1 = $requestContactInfo->txtMobilePhone1;
                    $editContactInfoObj->fgbMobilePhone2 = $requestContactInfo->txtMobilePhone2;
                    $editContactInfoObj->fgbMobilePhone3 = $requestContactInfo->txtMobilePhone3;
                    $editContactInfoObj->fgbFaxMail1 = $requestContactInfo->txtFaxMail1;
                    $editContactInfoObj->fgbFaxMail2 = $requestContactInfo->txtFaxMail2;
                    $editContactInfoObj->fgbPostalCode = $requestContactInfo->txtPostalCode;
                    $editContactInfoObj->fgbPublicEmail = $requestContactInfo->milPublicEmail;
                    $editContactInfoObj->fgbOfficeEmail = $requestContactInfo->milOfficeEmail;
                    $editContactInfoObj->fgbCountry = $requestContactInfo->cmbCountry;
                    $editContactInfoObj->fgbProvince = $requestContactInfo->cmbProvince;
                    $editContactInfoObj->fgbMunicipality = $requestContactInfo->txtMunicipality;
                    $editContactInfoObj->fgbStreetName = $requestContactInfo->txtStreetName;
                    $editContactInfoObj->fgbWoreda = $requestContactInfo->txtWoreda;
                    $editContactInfoObj->fgbZone = $requestContactInfo->txtZone;
                    $editContactInfoObj->fgbSubcity = $requestContactInfo->cmbSubcity;
                    $editContactInfoObj->fgbKebele = $requestContactInfo->txtKebele;
                    $editContactInfoObj->fgbBlockNum = $requestContactInfo->txtBlockNum;
                    $editContactInfoObj->fgbHouseNum = $requestContactInfo->txtHouseNum;
                    $editContactInfoObj->fgbLocationNaming = $requestContactInfo->txtLocationNaming;
                           
                    // Update Data on Database
                    $editContactInfoObj->update();
        
                    return redirect()->route('setting.church.getcontactaddress')
                        ->with('JoshKiyakoo_Success', '
                            <div class="row">
                                <div class="col-md-10">
                                    *** Church\'s profile data for <span style="font-weight: bold; color: BLUE;">CONTACT and ADDRESS </span> information was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                                </div>
                                <div class="col-md-2">
                                    <a class="text-right btn btn-outline-danger" href="websystemlink">Next Page</a>
                                </div>
                            </div>
                        ');
                }
                else {
                    return redirect()->route('setting.index')
                    ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Church\'s UCID '.$idContactInfo.'...');
                }
            }
            catch (Exception $throwContactInfo) {
                return redirect()->route('setting.index')
                    ->with ('JoshKiyakoo_Error', '*** Church\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwContactInfo.getMessage());
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getChurchWebSystemLink () {
        if (ChurchWebsystemLinkDataModel::all()) {
            $zWebSystemLink =
                DB::table('sfgbc_setting_WebSystemURL')->first();
            return view ('setting.church.websystemlink', compact ('zWebSystemLink'));
        }
        else {
            return redirect()->route('setting.church.websystemlink')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span>...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setChurchWebSystemLink (Request $requestWebsystemLink, $idWebsystemLink) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;

        if (is_Null ($requestWebsystemLink->txtMainDomainURL1) && is_Null ($requestWebsystemLink->txtSubDomainURL1)) {
                $myDataEntryFlag = 0;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;"> FILLED. </span>.....');
        }
        else {
            try {
                if (ChurchWebsystemLinkDataModel::find($idWebsystemLink)) {
                    // Object Model Defination
                    $editWebsystemLinkObj = ChurchWebsystemLinkDataModel::find($idWebsystemLink);
        
                    $editWebsystemLinkObj->fgbMainDomainURL1 = $requestWebsystemLink->txtMainDomainURL1;
                    $editWebsystemLinkObj->fgbMainDomainURL2 = $requestWebsystemLink->txtMainDomainURL2;
                    $editWebsystemLinkObj->fgbMainDomainURL3 = $requestWebsystemLink->txtMainDomainURL3;
                    $editWebsystemLinkObj->fgbSubDomainURL1 = $requestWebsystemLink->txtSubDomainURL1;
                    $editWebsystemLinkObj->fgbSubDomainURL2 = $requestWebsystemLink->txtSubDomainURL2;
                    $editWebsystemLinkObj->fgbSubDomainURL3 = $requestWebsystemLink->txtSubDomainURL3;
                    $editWebsystemLinkObj->fgbSubDomainName1_amh = $requestWebsystemLink->txtSubDomainName1_amh;
                    $editWebsystemLinkObj->fgbSubDomainName1_eng = $requestWebsystemLink->txtSubDomainName1_eng;
                    $editWebsystemLinkObj->fgbSubDomainName2_amh = $requestWebsystemLink->txtSubDomainName2_amh;
                    $editWebsystemLinkObj->fgbSubDomainName2_eng = $requestWebsystemLink->txtSubDomainName2_eng;
                    $editWebsystemLinkObj->fgbSubDomainName3_amh = $requestWebsystemLink->txtSubDomainName3_amh;
                    $editWebsystemLinkObj->fgbSubDomainName3_eng = $requestWebsystemLink->txtSubDomainName3_eng;

                    $editWebsystemLinkObj->fgbFacebookURL = $requestWebsystemLink->txtFacebookURL;
                    $editWebsystemLinkObj->fgbTelegramURL = $requestWebsystemLink->txtTelegramURL;
                    $editWebsystemLinkObj->fgbYoutubeURL = $requestWebsystemLink->txtYoutubeURL;
                    $editWebsystemLinkObj->fgbTwitterURL = $requestWebsystemLink->txtTwitterURL;
                    $editWebsystemLinkObj->fgbLinkedinURL = $requestWebsystemLink->txtLinkedinURL;
                    $editWebsystemLinkObj->fgbInstagramURL = $requestWebsystemLink->txtInstagramURL;
                    $editWebsystemLinkObj->fgbWhatsappURL = $requestWebsystemLink->txtWhatsappURL;
                    $editWebsystemLinkObj->fgbSkypeURL = $requestWebsystemLink->txtSkypeURL;
                           
                    // Update Data on Database
                    $editWebsystemLinkObj->update();
        
                    return redirect()->route('setting.church.getwebsystemlink')
                        ->with('JoshKiyakoo_Success', '
                            <div class="row">
                                <div class="col-md-10">
                                    *** Church\'s profile data for <span style="font-weight: bold; color: BLUE;">WEB SYSTEM URL LINK </span> information was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                                </div>
                                <div class="col-md-2">
                                    <a class="text-right btn btn-outline-danger" href="idformat">Next Page</a>
                                </div>
                            </div>
                        ');
                }
                else {
                    return redirect()->route('setting.index')
                    ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Church\'s UCID '.$idWebsystemLink.'...');
                }
            }
            catch (Exception $throwWebsystemLink) {
                return redirect()->route('setting.index')
                    ->with ('JoshKiyakoo_Error', '*** Church\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwWebsystemLink.getMessage());
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getChurchIDFormat () {
        if (MembersDataModel::all()) {
            // select('prefix')) {
            $zIDFormat =
                DB::table('sfgbc_Members')->select('prefix')->first(); //->distinct();
            return view ('setting.church.idformat', compact ('zIDFormat'));
        }
        else {
            return redirect()->route('setting.church.idformat')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s ID PREFIX FORMAT data <span style="font-weight: bolder; color: RED;">REGISTERED</span>...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setChurchIDFormat (Request $requestIDFormat) {
        // MembersDataModel::where('prefix', '=', )->update(['confirmed' => 1]);

        DB::table('sfgbc_Members')->update(['prefix' => $requestIDFormat->txtIDprefix]);

        return redirect()->route('setting.church.getidformat')
            ->with('JoshKiyakoo_Success', '
                <div class="row">
                    <div class="col-md-10">
                        *** Church\'s profile data for <span style="font-weight: bold; color: BLUE;">ID PREFIX FORMAT as '.$requestIDFormat->txtIDprefix.' </span> information was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                    </div>
                    <div class="col-md-2">
                        <a class="text-right btn btn-outline-danger" href="brandname">Next Page</a>
                    </div>
                </div>
            ');
    }
}
