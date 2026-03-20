<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\SystemConfigController;
use App\Http\Controllers\Admin\UserReviewsController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlacementRequestBannerController;
use App\Http\Controllers\PlacementRequestController;
use App\Http\Controllers\Admin\AdminPlacementRequestController;
use App\Http\Controllers\Admin\VolunteerPageController as AdminVolunteerPageController;
use App\Http\Controllers\VolunteerPageController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\Admin\DonateController as AdminDonateController; 

Route::get('/', function () {
    $Banner = App\Models\HomePageBanner::first();
    $menuImage = App\Models\HomePageMenuPicture::first();
    $menuItems = App\Models\HomePageMenu::orderBy('menu_order', 'asc')->get();
    $formSection = App\Models\HomePageForm::first();
    $choseUsItems = App\Models\HomePageChooseUs::all();
    $chooseUsPicture = App\Models\HomePageChooseUsPicture::first();
    $text = App\Models\HomePagePlacmentText::first();
    $placments = App\Models\HomePagePlacment::orderBy('id', 'asc')->get();
    return view('welcome', compact('Banner', 'menuImage', 'menuItems', 'formSection', 'choseUsItems', 'chooseUsPicture', 'text', 'placments'));
})->name('welcome');

Auth::routes(['register' => false]);
// FrontEnd
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [FrontEndController::class, 'aboutUs'])->name('aboutUs');
Route::get('/faq', [FrontEndController::class, 'faq'])->name('faq');

// Volunteer Page
Route::get('/volunteer', [VolunteerPageController::class, 'index'])->name('volunteer');

Route::post('/volunteer', [VolunteerPageController::class, 'store'])->name('volunteer.store');


// Placement Request Page
Route::get('/placement-request', [PlacementRequestController::class, 'index'])->name('placement.request');

// Form Submission
Route::post('/placement-request', [PlacementRequestController::class, 'store'])->name('placement.store');

// Frontend donate page
Route::get('/donate', [DonateController::class, 'index'])->name('donate');

// Frontend Donate Form Submission
Route::post('/donate/submit', [DonateController::class, 'storeDonation'])->name('DonateSubmit');

// Admin Panel
Route::middleware(['web', 'auth'])->group(function () {
    // config
    Route::get('/system-config', [SystemConfigController::class, 'systemconfigIndex'])->name('systemconfigIndex');
    Route::post('/update-system-config', [SystemConfigController::class, 'systemconfigUpdate'])->name('systemconfigUpdate');
    // Reviews
    Route::get('/user-reviews', [UserReviewsController::class, 'reviewsIndex'])->name('reviewsIndex');
    Route::post('/save-user-reviews', [UserReviewsController::class, 'reviewsStore'])->name('reviewsStore');
    Route::delete('/delete-user-review/{id}', [UserReviewsController::class, 'reviewsDestroy'])->name('reviewsDestroy');
    // Home page
    Route::get('/home-bannerSection', [HomePageController::class, 'HomePagebannerSection'])->name('HomePagebannerSection');
    Route::post('/update-home-banner', [HomePageController::class, 'HomePageUpdateBanner'])->name('HomePageUpdateBanner');
    Route::get('/home-menuSection', [HomePageController::class, 'HomePagemenuSection'])->name('HomePagemenuSection');
    Route::post('/update-home-menuSection', [HomePageController::class, 'HomePageUpdateMenuSection'])->name('HomePageUpdateMenuSection');
    Route::delete('/delete-home-menuSection/{id}', [HomePageController::class, 'HomePageDeleteMenuSection'])->name('HomePageDeleteMenuSection');
    Route::post('/update-home-menuSection-image', [HomePageController::class, 'HomePageUpdateMenuSectionImage'])->name('HomePageUpdateMenuSectionImage');
    Route::get('/home-formSection', [HomePageController::class, 'HomePageformSection'])->name('HomePageformSection');
    Route::post('/update-home-formSection', [HomePageController::class, 'HomePageUpdateFormSection'])->name('HomePageUpdateFormSection');
    Route::get('/home-chooseUsSection', [HomePageController::class, 'HomePageChooseUsSection'])->name('HomePageChooseUsSection');
    Route::post('/update-home-chooseUsSection', [HomePageController::class, 'HomePageUpdateChooseUsSection'])->name('HomePageUpdateChooseUsSection');
    Route::delete('/delete-home-chooseUsSection/{id}', [HomePageController::class, 'HomePageDeleteChooseUsSection'])->name('HomePageDeleteChooseUsSection');
    Route::post('/update-home-chooseUsSection-image', [HomePageController::class, 'HomePageUpdateChooseUsSectionImage'])->name('HomePageUpdateChooseUsSectionImage');
    Route::get('/home-placmentSection', [HomePageController::class, 'HomePagePlacmentSection'])->name('HomePagePlacmentSection');
    Route::post('/update-home-placmentSection', [HomePageController::class, 'HomePageUpdatePlacmentSection'])->name('HomePageUpdatePlacmentSection');
    Route::delete('/delete-home-placmentSection/{id}', [HomePageController::class, 'HomePageDeletePlacmentSection'])->name('HomePageDeletePlacmentSection');
    Route::post('/update-home-placmentSection-text', [HomePageController::class, 'HomePageUpdatePlacmentSectionText'])->name('HomePageUpdatePlacmentSectionText');
    // About Us Page
    Route::get('/about-bannerSection', [AboutUsController::class, 'AboutbannerSection'])->name('AboutbannerSection');
    Route::post('/update-about-bannerSection', [AboutUsController::class, 'AboutUpdatebannerSection'])->name('AboutUpdatebannerSection');
    Route::get('/about-offerSection', [AboutUsController::class, 'AboutOfferSection'])->name('AboutOfferSection');
    Route::post('/update-about-offerSection', [AboutUsController::class, 'AboutUpdateOfferSection'])->name('AboutUpdateOfferSection');
    Route::delete('/delete-about-offerSection/{id}', [AboutUsController::class, 'AboutDeleteOfferSection'])->name('AboutDeleteOfferSection');
    Route::get('/about-welcomeSection', [AboutUsController::class, 'AboutWelcomeSection'])->name('AboutWelcomeSection');
    Route::post('/update-about-welcomeSection', [AboutUsController::class, 'AboutUpdateWelcomeSection'])->name('AboutUpdateWelcomeSection');
    Route::post('/update-about-welcomeSection-image', [AboutUsController::class, 'AboutUpdateWelcomeSectionImage'])->name('AboutUpdateWelcomeSectionImage');
    Route::get('/about-counterSection', [AboutUsController::class, 'AboutcounterSection'])->name('AboutcounterSection');
    Route::post('/update-about-counterSection', [AboutUsController::class, 'AboutUpdatecounterSection'])->name('AboutUpdatecounterSection');
    Route::delete('/delete-about-counterSection/{id}', [AboutUsController::class, 'AboutDeletecounterSection'])->name('AboutDeletecounterSection');
    // FAQ Page
    Route::get('/faq-bannerSection', [FAQController::class, 'FAQbannerSection'])->name('FAQbannerSection');
    Route::post('/update-faq-bannerSection', [FAQController::class, 'FAQUpdatebannerSection'])->name('FAQUpdatebannerSection');
    Route::get('/faq-q&ASection', [FAQController::class, 'FAQQASection'])->name('FAQQ&ASection');
    Route::post('/update-faq-q&ASection', [FAQController::class, 'FAQUpdateQASection'])->name('FAQUpdateQ&ASection');
    Route::delete('/delete-faq-q&ASection/{id}', [FAQController::class, 'FAQDeleteQASection'])->name('faqDeleteQ&ASection');
    // Admin Placement Request Banner Section
Route::get(
    '/placement-request-bannerSection',
    [PlacementRequestBannerController::class, 'index']
)->name('PlacementRequestBannerSection');

Route::post(
    '/update-placement-request-bannerSection',
    [PlacementRequestBannerController::class, 'update']
)->name('PlacementRequestBannerUpdate');

 // Placement Request User Submissions
    Route::get('/admin-placement-requests', [AdminPlacementRequestController::class, 'index'])->name('admin.placement.requests');

   // Volunteer Page update admin routes
   Route::get('/volunteer-heroSection', [AdminVolunteerPageController::class, 'VolunteerheroSection'])->name('VolunteerHeroSection');
Route::post('/update-volunteer-heroSection', [AdminVolunteerPageController::class, 'VolunteerUpdateheroSection'])->name('VolunteerUpdateHero');

// Volunteer Roles Section
Route::get('/volunteer-rolesSection', [AdminVolunteerPageController::class, 'VolunteerRolesSection'])->name('VolunteerRolesSection');
Route::post('/update-volunteer-rolesSection', [AdminVolunteerPageController::class, 'VolunteerUpdateRolesSection'])->name('VolunteerUpdateRolesSection');

// Volunteer Why Us Section
Route::get('/volunteer-whyUsSection', [AdminVolunteerPageController::class, 'VolunteerWhyUsSection'])->name('VolunteerWhyUsSection');
Route::post('/update-volunteer-whyUsSection', [AdminVolunteerPageController::class, 'VolunteerUpdateWhyUsSection'])->name('VolunteerUpdateWhyUsSection');
Route::post('/update-volunteer-whyUsSection-image', [AdminVolunteerPageController::class, 'VolunteerUpdateWhyUsSectionImage'])->name('VolunteerUpdateWhyUsSectionImage');

// Volunteer Why Us Image Delete
Route::delete('/delete-volunteer-whyUs-image', [AdminVolunteerPageController::class, 'VolunteerDeleteWhyUsImage'])->name('VolunteerDeleteWhyUsImage');


Route::get('/volunteer-applications', [AdminVolunteerPageController::class, 'VolunteerApplications'])->name('VolunteerApplications');

// Volunteer Testimonials Section
Route::get('/volunteer-testimonials', [AdminVolunteerPageController::class, 'VolunteerTestimonials'])->name('VolunteerTestimonials');
Route::post('/update-volunteer-testimonial', [AdminVolunteerPageController::class, 'VolunteerUpdateTestimonial'])->name('VolunteerUpdateTestimonial');
Route::delete('/delete-volunteer-testimonial/{id}', [AdminVolunteerPageController::class, 'VolunteerDeleteTestimonial'])->name('VolunteerDeleteTestimonial');


// Donate Page Routes
Route::get('/admin/donate/hero', [AdminDonateController::class, 'heroSection'])->name('DonateHeroSection');
Route::post('/admin/donate/hero/update', [AdminDonateController::class, 'updateHeroSection'])->name('DonateUpdateHero');
Route::delete('/admin/donate/hero/delete', [AdminDonateController::class, 'deleteHeroSection'])->name('DonateDeleteHero');

// Donate Form Section
Route::get('/admin/donate/form', [AdminDonateController::class, 'formSection'])->name('DonateFormSection');
Route::post('/admin/donate/form/update', [AdminDonateController::class, 'updateFormSection'])->name('DonateUpdateForm');
Route::delete('/admin/donate/form/delete', [AdminDonateController::class, 'deleteFormSection'])->name('DonateDeleteForm');


// Why Donate Section
Route::get('/admin/donate/why', [AdminDonateController::class, 'whyDonateSection'])->name('DonateWhyDonateSection');
Route::post('/admin/donate/why/add', [AdminDonateController::class, 'updateWhyDonateSection'])->name('DonateAddWhyDonate');
Route::delete('/admin/donate/why/delete/{id}', [AdminDonateController::class, 'deleteWhyDonateSection'])->name('DonateDeleteWhyDonate');


// Why Donate Texts
Route::get('/admin/donate/why-text', [AdminDonateController::class, 'whyDonateTextSection'])->name('DonateWhyTextSection');
Route::post('/admin/donate/why-text/update', [AdminDonateController::class, 'updateWhyDonateTextSection'])->name('DonateUpdateWhyText');
Route::delete('/admin/donate/why-text/delete', [AdminDonateController::class, 'deleteWhyDonateTextSection'])->name('DonateDeleteWhyText');


// Ways to Give Section
Route::get('/admin/donate/ways-to-give', [AdminDonateController::class, 'waysToGiveSection'])->name('DonateWaysToGiveSection');
Route::post('/admin/donate/ways-to-give/add', [AdminDonateController::class, 'updateWaysToGiveSection'])->name('DonateAddWaysToGive');
Route::post('/admin/donate/ways-to-give/text', [AdminDonateController::class, 'updateWaysToGiveText'])->name('DonateUpdateWaysToGiveText');
Route::delete('/admin/donate/ways-to-give/delete/{id}', [AdminDonateController::class, 'deleteWaysToGiveSection'])->name('DonateDeleteWaysToGive');


// Where Your Money Goes Section
Route::get('/admin/donate/where-money-goes', [AdminDonateController::class, 'whereMoneyGoesSection'])->name('DonateWhereMoneyGoesSection');
Route::post('/admin/donate/where-money-goes/text', [AdminDonateController::class, 'updateWhereMoneyGoesText'])->name('DonateUpdateWhereMoneyGoesText');
Route::post('/admin/donate/where-money-goes/card', [AdminDonateController::class, 'addWhereMoneyGoesCard'])->name('DonateAddWhereMoneyGoesCard');
Route::delete('/admin/donate/where-money-goes/card/{id}', [AdminDonateController::class, 'deleteWhereMoneyGoesCard'])->name('DonateDeleteWhereMoneyGoesCard');

// Donor Recognition Section
Route::get('/admin/donate/donor-recognition', [AdminDonateController::class, 'donorRecognitionSection'])->name('DonateDonorRecognitionSection');
Route::post('/admin/donate/donor-recognition/text', [AdminDonateController::class, 'updateDonorRecognitionText'])->name('DonateUpdateDonorRecognitionText');
Route::post('/admin/donate/donor-recognition/card', [AdminDonateController::class, 'addDonorRecognitionCard'])->name('DonateAddDonorRecognitionCard');
Route::delete('/admin/donate/donor-recognition/card/{id}', [AdminDonateController::class, 'deleteDonorRecognitionCard'])->name('DonateDeleteDonorRecognitionCard');


      // Donation Submissions
    Route::get('/admin/donate/submissions', [AdminDonateController::class, 'donationSubmissions'])->name('DonateSubmissions');
    Route::delete('/admin/donate/submission/{id}', [AdminDonateController::class, 'deleteDonationSubmission'])->name('DonateDeleteSubmission');

    // Form Extra Texts (Second Form ke liye)
    Route::get('/admin/donate/extra-texts', [AdminDonateController::class, 'extraTextSection'])->name('DonateExtraTexts');
    Route::post('/admin/donate/extra-texts/update', [AdminDonateController::class, 'updateExtraText'])->name('DonateUpdateExtraText');

});
