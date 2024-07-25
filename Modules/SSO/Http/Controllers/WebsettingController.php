<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOClasse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\MediaManager;
use App\Models\SystemSetting;

class WebsettingController extends Controller
{


    # website header configuration
    public function index()
    {

        return view('sso::appearance.web_setting');
    }


    # update settings
    public function update(Request $request)
    {

        //  dd($request->all());
        foreach ($request->types as $key => $type) {
            // for currency rate
            if ($type == 'DEFAULT_CURRENCY') {
                $currency = Currency::where('code', $request[$type])->first();
                writeToEnvFile('DEFAULT_CURRENCY', $currency->code);
                writeToEnvFile('DEFAULT_CURRENCY_SYMBOL', $currency->symbol);
                writeToEnvFile('DEFAULT_CURRENCY_SYMBOL_ALIGNMENT', $currency->alignment);
            }

            # web maintenance mode
            if ($type == 'enable_maintenance_mode') {
                # maintenance
                if (env('DEMO_MODE') != 'On') {
                    if ($request[$type] == "1") {
                        Artisan::call('down');
                    } else {
                        Artisan::call('up');
                    }
                }
            }

            # timezone
            if ($type == 'timezone') {
                writeToEnvFile('APP_TIMEZONE', $request[$type]);
            } else if ($type == "GOOGLE_CLIENT_ID" || $type == "GOOGLE_CLIENT_SECRET" || $type == "FACEBOOK_APP_ID" || $type == "FACEBOOK_APP_SECRET" || $type == "RECAPTCHA_SITE_KEY" || $type == "RECAPTCHA_SECRET_KEY") {
                writeToEnvFile($type, $request[$type]);
            } else {
                $value = $request[$type];

                if ($type == 'system_title') {
                    writeToEnvFile('APP_NAME', $value);
                }

                $settings = SystemSetting::where('entity', $type)->first();
                if ($settings != null) {
                    if (gettype($value) == 'array') {
                        $settings->value = json_encode($value);
                    } else {
                        $settings->value = $value;
                    }
                } else {
                    $settings = new SystemSetting;
                    $settings->entity = $type;
                    if (gettype($value) == 'array') {
                        $settings->value = json_encode($value);
                    } else {
                        $settings->value = $value;
                    }
                }
                $settings->save();


                // Check if sso_brochure key exists in the request and a new file is uploaded
                // if ($type == 'sso_brochure' && $request->hasFile('sso_brochure')) {
                //     $file = $request->file('sso_brochure');

                //     // Get the current timestamp
                //     $timestamp = now()->timestamp;

                //     // Get the original file extension
                //     $extension = $file->getClientOriginalExtension();

                //     // Combine timestamp and extension to create a unique filename
                //     $fileName = $timestamp . '.' . $extension;

                //     // Store the file with the new filename
                //     $mediaFile = $file->storeAs('uploads/pdf', $fileName);

                //     // Update the system setting with the new file path
                //     $sysytemsettings = SystemSetting::where('entity', $type)->first();
                //     if ($sysytemsettings != null) {
                //         $sysytemsettings->value = $mediaFile;
                //     } else {
                //         // Handle if the setting doesn't exist
                //     }
                //     $sysytemsettings->save();
                // } elseif ($type == 'sso_brochure') {
                //     // No new file uploaded, retain the existing file path
                //     $existingSetting = SystemSetting::where('entity', $type)->first();
                //     if ($existingSetting != null) {
                //         $mediaFile = $existingSetting->value;

                //         // Update the system setting with the existing file path
                //         $sysytemsettings = SystemSetting::where('entity', $type)->first();
                //         if ($sysytemsettings != null) {
                //             $sysytemsettings->value = $mediaFile;
                //         } else {
                //             // Handle if the setting doesn't exist
                //         }
                //         $sysytemsettings->save();
                //     }
                // }
            }
        }

        cacheClear();
        flash(localize("Settings updated successfully"))->success();
        return back();
    }
}
