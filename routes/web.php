<?php

Route::group(
    [
        "namespace" => "Theme\Pyoris\Http\Controllers",
        "middleware" => ["web", "core"],
    ],
    function () {
        Route::group(
            apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []),
            function () {
                Route::get("ajax/search", "PyorisController@getSearch")->name(
                    "public.ajax.search"
                );
            }
        );
    }
);

Theme::routes();

Route::group(
    [
        "namespace" => "Theme\Pyoris\Http\Controllers",
        "middleware" => ["web", "core"],
    ],
    function () {
        Route::group(
            apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []),
            function () {
                Route::get("/", "PyorisController@getIndex")->name(
                    "public.index"
                );

                Route::get("sitemap.xml", [
                    "as" => "public.sitemap",
                    "uses" => "PyorisController@getSiteMap",
                ]);

                Route::get(
                    "{slug?}" .
                        config("core.base.general.public_single_ending_url"),
                    [
                        "as" => "public.single",
                        "uses" => "PyorisController@getView",
                    ]
                );
            }
        );
    }
);
