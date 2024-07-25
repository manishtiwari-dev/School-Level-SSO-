<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;
use Auth;
use Modules\SSO\Models\SSOPage;
use Modules\SSO\Models\SSOPageLocalization;
use Modules\SSO\Models\SSOInstitute;
use Modules\SSO\Models\SSOClasse;
use App\Models\Country;
use App\Models\State;


class TopNavBar extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {

    

        $pages_data = SSOPage::all();
      

        return getView('inc.header', ['pages_data' => $pages_data]);
    }
}
