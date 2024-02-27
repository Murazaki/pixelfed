<?php

Route::domain(config('pixelfed.domain.admin'))->prefix('i/admin')->group(function () {
    Route::redirect('/', '/dashboard');
    Route::redirect('timeline', config('app.url').'/timeline');
    Route::get('dashboard', 'AdminController@home')->name('admin.home');
    Route::get('stats', 'AdminController@stats')->name('admin.stats');
    Route::get('reports', 'AdminController@reports')->name('admin.reports');
    Route::get('reports/show/{id}', 'AdminController@showReport');
    Route::post('reports/show/{id}', 'AdminController@updateReport');
    Route::post('reports/bulk', 'AdminController@bulkUpdateReport');
    Route::get('reports/autospam/{id}', 'AdminController@showSpam');
    Route::post('reports/autospam/sync', 'AdminController@fixUncategorizedSpam');
    Route::post('reports/autospam/{id}', 'AdminController@updateSpam');
    Route::get('reports/autospam', 'AdminController@spam');
    Route::get('reports/appeals', 'AdminController@appeals');
    Route::get('reports/appeal/{id}', 'AdminController@showAppeal');
    Route::post('reports/appeal/{id}', 'AdminController@updateAppeal');
    Route::get('reports/email-verifications', 'AdminController@reportMailVerifications');
    Route::post('reports/email-verifications/ignore', 'AdminController@reportMailVerifyIgnore');
    Route::post('reports/email-verifications/approve', 'AdminController@reportMailVerifyApprove');
    Route::post('reports/email-verifications/clear-ignored', 'AdminController@reportMailVerifyClearIgnored');
    Route::redirect('stories', '/stories/list');
    Route::get('stories/list', 'AdminController@stories')->name('admin.stories');
    Route::redirect('statuses', '/statuses/list');
    Route::get('statuses/list', 'AdminController@statuses')->name('admin.statuses');
    Route::get('statuses/show/{id}', 'AdminController@showStatus');
    Route::redirect('profiles', '/i/admin/profiles/list');
    Route::get('profiles/list', 'AdminController@profiles')->name('admin.profiles');
    Route::get('profiles/edit/{id}', 'AdminController@profileShow');
    Route::redirect('users', '/users/list');
    Route::get('users/list', 'AdminController@users')->name('admin.users');
    Route::get('users/show/{id}', 'AdminController@userShow');
    Route::get('users/edit/{id}', 'AdminController@userEdit');
    Route::post('users/edit/{id}', 'AdminController@userEditSubmit');
    Route::get('users/activity/{id}', 'AdminController@userActivity');
    Route::get('users/message/{id}', 'AdminController@userMessage');
    Route::post('users/message/{id}', 'AdminController@userMessageSend');
    Route::get('users/modtools/{id}', 'AdminController@userModTools');
    Route::get('users/modlogs/{id}', 'AdminController@userModLogs');
    Route::post('users/modlogs/{id}', 'AdminController@userModLogsMessage');
    Route::post('users/modlogs/{id}/delete', 'AdminController@userModLogDelete');
    Route::get('users/delete/{id}', 'AdminController@userDelete');
    Route::post('users/delete/{id}', 'AdminController@userDeleteProcess');
    Route::post('users/moderation/update', 'AdminController@userModerate');
    Route::get('media', 'AdminController@media')->name('admin.media');
    Route::redirect('media/list', '/i/admin/media');
    Route::get('media/show/{id}', 'AdminController@mediaShow');
    Route::get('settings', 'AdminController@settings')->name('admin.settings');
    Route::post('settings', 'AdminController@settingsHomeStore');
    Route::get('settings/features', 'AdminController@settingsFeatures')->name('admin.settings.features');
    Route::get('settings/pages', 'AdminController@settingsPages')->name('admin.settings.pages');
    Route::get('settings/pages/edit', 'PageController@edit')->name('admin.settings.pages.edit');
    Route::post('settings/pages/edit', 'PageController@store');
    Route::post('settings/pages/delete', 'PageController@delete');
    Route::post('settings/pages/create', 'PageController@generatePage');
    Route::get('settings/maintenance', 'AdminController@settingsMaintenance')->name('admin.settings.maintenance');
    Route::get('settings/backups', 'AdminController@settingsBackups')->name('admin.settings.backups');
    Route::get('settings/storage', 'AdminController@settingsStorage')->name('admin.settings.storage');
    Route::get('settings/system', 'AdminController@settingsSystem')->name('admin.settings.system');

    Route::get('instances', 'AdminController@instances')->name('admin.instances');
    Route::post('instances', 'AdminController@instanceScan');
    Route::get('instances/show/{id}', 'AdminController@instanceShow');
    Route::post('instances/edit/{id}', 'AdminController@instanceEdit');
    Route::get('apps/home', 'AdminController@appsHome')->name('admin.apps');
    Route::get('hashtags/home', 'AdminController@hashtagsHome')->name('admin.hashtags');
    Route::get('discover/home', 'AdminController@discoverHome')->name('admin.discover');
    Route::get('discover/category/create', 'AdminController@discoverCreateCategory')->name('admin.discover.create-category');
    Route::post('discover/category/create', 'AdminController@discoverCreateCategoryStore');
    Route::get('discover/category/edit/{id}', 'AdminController@discoverCategoryEdit');
    Route::post('discover/category/edit/{id}', 'AdminController@discoverCategoryUpdate');
    Route::post('discover/category/hashtag/create', 'AdminController@discoveryCategoryTagStore')->name('admin.discover.create-hashtag');

    Route::get('messages/home', 'AdminController@messagesHome')->name('admin.messages');
    Route::get('messages/show/{id}', 'AdminController@messagesShow');
    Route::post('messages/mark-read', 'AdminController@messagesMarkRead');
    Route::redirect('site-news', '/i/admin/newsroom');
    Route::get('newsroom', 'AdminController@newsroomHome')->name('admin.newsroom.home');
    Route::get('newsroom/create', 'AdminController@newsroomCreate')->name('admin.newsroom.create');
    Route::get('newsroom/edit/{id}', 'AdminController@newsroomEdit');
    Route::post('newsroom/edit/{id}', 'AdminController@newsroomUpdate');
    Route::delete('newsroom/edit/{id}', 'AdminController@newsroomDelete');
    Route::post('newsroom/create', 'AdminController@newsroomStore');

    Route::get('diagnostics/home', 'AdminController@diagnosticsHome')->name('admin.diagnostics');
    Route::post('diagnostics/decrypt', 'AdminController@diagnosticsDecrypt')->name('admin.diagnostics.decrypt');
    Route::get('custom-emoji/home', 'AdminController@customEmojiHome')->name('admin.custom-emoji');
    Route::post('custom-emoji/toggle-active/{id}', 'AdminController@customEmojiToggleActive');
    Route::get('custom-emoji/new', 'AdminController@customEmojiAdd');
    Route::post('custom-emoji/new', 'AdminController@customEmojiStore');
    Route::post('custom-emoji/delete/{id}', 'AdminController@customEmojiDelete');
    Route::get('custom-emoji/duplicates/{id}', 'AdminController@customEmojiShowDuplicates');

    Route::get('directory/home', 'AdminController@directoryHome')->name('admin.directory');

    Route::get('autospam/home', 'AdminController@autospamHome')->name('admin.autospam');

    Route::redirect('asf/', 'asf/home');
    Route::get('asf/home', 'AdminShadowFilterController@home');
    Route::get('asf/create', 'AdminShadowFilterController@create');
    Route::get('asf/edit/{id}', 'AdminShadowFilterController@edit');
    Route::post('asf/edit/{id}', 'AdminShadowFilterController@storeEdit');
    Route::post('asf/create', 'AdminShadowFilterController@store');

    Route::get('asf/home', 'AdminShadowFilterController@home');
    Route::redirect('curated-onboarding/', 'curated-onboarding/home');
    Route::get('curated-onboarding/home', 'AdminCuratedRegisterController@index')->name('admin.curated-onboarding');
    Route::get('curated-onboarding/templates', 'AdminCuratedRegisterController@templates')->name('admin.curated-onboarding.templates');
    Route::get('curated-onboarding/templates/create', 'AdminCuratedRegisterController@templateCreate')->name('admin.curated-onboarding.create-template');
    Route::post('curated-onboarding/templates/create', 'AdminCuratedRegisterController@templateStore');
    Route::get('curated-onboarding/templates/edit/{id}', 'AdminCuratedRegisterController@templateEdit');
    Route::post('curated-onboarding/templates/edit/{id}', 'AdminCuratedRegisterController@templateEditStore');
    Route::delete('curated-onboarding/templates/edit/{id}', 'AdminCuratedRegisterController@templateDelete');
    Route::get('curated-onboarding/show/{id}/preview-details-message', 'AdminCuratedRegisterController@previewDetailsMessageShow');
    Route::get('curated-onboarding/show/{id}/preview-message', 'AdminCuratedRegisterController@previewMessageShow');
    Route::get('curated-onboarding/show/{id}', 'AdminCuratedRegisterController@show');

    Route::prefix('api')->group(function() {
        Route::get('stats', 'AdminController@getStats');
        Route::get('accounts', 'AdminController@getAccounts');
        Route::get('posts', 'AdminController@getPosts');
        Route::get('instances', 'AdminController@getInstances');
        Route::post('directory/save', 'AdminController@directoryStore');
        Route::get('directory/initial-data', 'AdminController@directoryInitialData');
        Route::get('directory/popular-posts', 'AdminController@directoryGetPopularPosts');
        Route::post('directory/add-by-id', 'AdminController@directoryGetAddPostByIdSearch');
        Route::delete('directory/banner-image', 'AdminController@directoryDeleteBannerImage');
        Route::post('directory/submit', 'AdminController@directoryHandleServerSubmission');
        Route::post('directory/testimonial/save', 'AdminController@directorySaveTestimonial');
        Route::post('directory/testimonial/delete', 'AdminController@directoryDeleteTestimonial');
        Route::post('directory/testimonial/update', 'AdminController@directoryUpdateTestimonial');
        Route::get('hashtags/stats', 'AdminController@hashtagsStats');
        Route::get('hashtags/query', 'AdminController@hashtagsApi');
        Route::get('hashtags/get', 'AdminController@hashtagsGet');
        Route::post('hashtags/update', 'AdminController@hashtagsUpdate');
        Route::post('hashtags/clear-trending-cache', 'AdminController@hashtagsClearTrendingCache');
        Route::get('instances/get', 'AdminController@getInstancesApi');
        Route::get('instances/stats', 'AdminController@getInstancesStatsApi');
        Route::get('instances/query', 'AdminController@getInstancesQueryApi');
        Route::post('instances/update', 'AdminController@postInstanceUpdateApi');
        Route::post('instances/create', 'AdminController@postInstanceCreateNewApi');
        Route::post('instances/delete', 'AdminController@postInstanceDeleteApi');
        Route::post('instances/refresh-stats', 'AdminController@postInstanceRefreshStatsApi');
        Route::get('instances/download-backup', 'AdminController@downloadBackup');
        Route::post('instances/import-data', 'AdminController@importBackup');
        Route::get('reports/stats', 'AdminController@reportsStats');
        Route::get('reports/all', 'AdminController@reportsApiAll');
        Route::get('reports/get/{id}', 'AdminController@reportsApiGet');
        Route::post('reports/handle', 'AdminController@reportsApiHandle');
        Route::get('reports/spam/all', 'AdminController@reportsApiSpamAll');
        Route::get('reports/spam/get/{id}', 'AdminController@reportsApiSpamGet');
        Route::post('reports/spam/handle', 'AdminController@reportsApiSpamHandle');
        Route::post('autospam/config', 'AdminController@getAutospamConfigApi');
        Route::post('autospam/reports/closed', 'AdminController@getAutospamReportsClosedApi');
        Route::post('autospam/train', 'AdminController@postAutospamTrainSpamApi');
        Route::post('autospam/search/non-spam', 'AdminController@postAutospamTrainNonSpamSearchApi');
        Route::post('autospam/train/non-spam', 'AdminController@postAutospamTrainNonSpamSubmitApi');
        Route::post('autospam/tokens/custom', 'AdminController@getAutospamCustomTokensApi');
        Route::post('autospam/tokens/store', 'AdminController@saveNewAutospamCustomTokensApi');
        Route::post('autospam/tokens/update', 'AdminController@updateAutospamCustomTokensApi');
        Route::post('autospam/tokens/export', 'AdminController@exportAutospamCustomTokensApi');
        Route::post('autospam/config/enable', 'AdminController@enableAutospamApi');
        Route::post('autospam/config/disable', 'AdminController@disableAutospamApi');
        // Route::get('instances/{id}/accounts', 'AdminController@getInstanceAccounts');
        Route::get('curated-onboarding/show/{id}/activity-log', 'AdminCuratedRegisterController@apiActivityLog');
        Route::post('curated-onboarding/show/{id}/message/preview', 'AdminCuratedRegisterController@apiMessagePreviewStore');
        Route::post('curated-onboarding/show/{id}/message/send', 'AdminCuratedRegisterController@apiMessageSendStore');
        Route::post('curated-onboarding/show/{id}/reject', 'AdminCuratedRegisterController@apiHandleReject');
        Route::post('curated-onboarding/show/{id}/approve', 'AdminCuratedRegisterController@apiHandleApprove');
        Route::get('curated-onboarding/templates/get', 'AdminCuratedRegisterController@getActiveTemplates');
    });
});
