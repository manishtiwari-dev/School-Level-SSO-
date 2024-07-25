<ul class="tt-side-nav">

    <!-- dashboard -->
    <li class="side-nav-item nav-item">
        <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="pie-chart"></i></span>
            <span class="tt-nav-link-text">{{ localize('Dashboard') }}</span>
        </a>
    </li>

  

    {{-- SSO --}}
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">{{ localize('School Sports Olympia') }} (SSO)</span>
    </li>

    @php
        $collegeActiveRoutes = [
            'admin.institute.index',
            'admin.institute.create',
            'admin.institute.edit',
            'admin.student.index',
            'admin.student.create',
            'admin.students.edit',
            'admin.class.index',
            'admin.class.create',
            'admin.class.edit',
            'admin.student.import',
           'admin.institute.view'
        ];
    @endphp

    @php
        $examActiveRoutes = [
            'admin.book.index',
            'admin.book.create',
            'admin.book.edit',
            'admin.syllabus.index',
            'admin.syllabus.create',
            'admin.syllabus.edit',
            'admin.model-paper.index',
            'admin.model-paper.create',
            'admin.model-paper.edit',
            'admin.competition.index',
            'admin.competition.create',
            'admin.competition.edit',
        ];
    @endphp

    <!--  settings -->
    @php
        $settingsActiveRoutes = ['admin.generalSettings', 'admin.smtpSettings.index', 'admin.appearance.homepage.hero',
            'admin.appearance.homepage.editHero',
            ];
    @endphp

    <li class="side-nav-item nav-item {{ areActiveRoutes($settingsActiveRoutes, 'tt-menu-item-active') }}">
        <a data-bs-toggle="collapse" href="#Setting"
            aria-expanded="{{ areActiveRoutes($settingsActiveRoutes, 'true') }}" aria-controls="Setting"
            class="side-nav-link tt-menu-toggle">
            <span class="tt-nav-link-icon"><i data-feather="settings"></i></span>
            <span class="tt-nav-link-text">{{ localize('Settings') }}</span>
        </a>
        <div class="collapse {{ areActiveRoutes($settingsActiveRoutes, 'show') }}" id="Setting">
            <ul class="side-nav-second-level">

                <li class="{{ areActiveRoutes($settingsActiveRoutes, 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.appearance.homepage.hero') }}"
                        class="{{ areActiveRoutes($settingsActiveRoutes) }}">{{ localize('Homepage') }}</a>
                </li>

              
                <li
                class="{{ areActiveRoutes(['admin.websettings.index'], 'tt-menu-item-active') }}">
                <a href="{{ route('admin.websettings.index') }}"
                    class="{{ areActiveRoutes(['admin.websettings.index'], 'tt-menu-item-active') }}">{{ localize('Web Setting') }}</a>
               </li>


            </ul>
        </div>
    </li>

    <li class="side-nav-item nav-item {{ areActiveRoutes($collegeActiveRoutes, 'tt-menu-item-active') }}">
        <a data-bs-toggle="collapse" href="#collegeSystem"
            aria-expanded="{{ areActiveRoutes($collegeActiveRoutes, 'true') }}" aria-controls="collegeSystem"
            class="side-nav-link tt-menu-toggle">
            <span class="tt-nav-link-icon"><i data-feather="file-text"></i></span>
            <span class="tt-nav-link-text">{{ localize('Registration') }}</span>
        </a>
        <div class="collapse {{ areActiveRoutes($collegeActiveRoutes, 'show') }}" id="collegeSystem">
            <ul class="side-nav-second-level">
                <li
                    class="{{ areActiveRoutes(['admin.institute.index', 'admin.institute.create', 'admin.institute.edit','admin.institute.view'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.institute.index') }}"
                        class="{{ areActiveRoutes(['admin.institute.index', 'admin.institute.create', 'admin.institute.edit','admin.institute.view'], 'tt-menu-item-active') }}">{{ localize('Institute') }}</a>
                </li>
                <li
                    class="{{ areActiveRoutes(['admin.student.index', 'admin.student.create', 'admin.students.edit', 'admin.student.import'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.student.index') }}"
                        class="{{ areActiveRoutes(['admin.student.index', 'admin.student.create', 'admin.students.edit', 'admin.student.import'], 'tt-menu-item-active') }}">{{ localize('Student') }}</a>
                </li>

                <li
                    class="{{ areActiveRoutes(['admin.class.index', 'admin.class.create', 'admin.class.edit'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.class.index') }}"
                        class="{{ areActiveRoutes(['admin.class.index', 'admin.class.create', 'admin.class.edit'], 'tt-menu-item-active') }}">{{ localize('Classes') }}</a>
                </li>

            </ul>

        </div>

    </li>

    <li class="side-nav-item nav-item {{ areActiveRoutes($examActiveRoutes, 'tt-menu-item-active') }}">
        <a data-bs-toggle="collapse" href="#exams"
            aria-expanded="{{ areActiveRoutes($examActiveRoutes, 'true') }}" aria-controls="exams"
            class="side-nav-link tt-menu-toggle">
            <span class="tt-nav-link-icon"><i data-feather="book"></i></span>
            <span class="tt-nav-link-text">{{ localize('Exam') }}</span>
        </a>
        <div class="collapse {{ areActiveRoutes($examActiveRoutes, 'show') }}" id="exams">
            <ul class="side-nav-second-level">

                <li class="{{ areActiveRoutes(['admin.competition.index','admin.competition.create','admin.competition.edit'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.competition.index') }}"
                        class="{{ areActiveRoutes(['admin.competition.index','admin.competition.create','admin.competition.edit'], 'tt-menu-item-active') }}">{{ localize('Exam') }}</a>
                </li>

                <li
                    class="{{ areActiveRoutes(['admin.book.index', 'admin.book.create', 'admin.book.edit'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.book.index') }}"
                        class="{{ areActiveRoutes(['admin.book.index', 'admin.book.create', 'admin.book.edit'], 'tt-menu-item-active') }}">{{ localize('Book') }}</a>
                </li>

                <li
                    class="{{ areActiveRoutes(['admin.syllabus.index', 'admin.syllabus.create', 'admin.syllabus.edit'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.syllabus.index') }}"
                        class="{{ areActiveRoutes(['admin.syllabus.index', 'admin.syllabus.create', 'admin.syllabus.edit'], 'tt-menu-item-active') }}">{{ localize('Syllabus') }}</a>
                </li>

                <li
                    class="{{ areActiveRoutes(['admin.model-paper.index', 'admin.model-paper.create', 'admin.model-paper.edit'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.model-paper.index') }}"
                        class="{{ areActiveRoutes(['admin.model-paper.index', 'admin.model-paper.create', 'admin.model-paper.edit'], 'tt-menu-item-active') }}">{{ localize('Model Paper') }}</a>
                </li>
            </ul>

        </div>

    </li>

    <!--  scholarshipActiveRoutes -->

    @php
    $scholarshipActiveRoutes = ['admin.scholarship.index', 'admin.scholarship.create', 'admin.scholarship.edit'];
    @endphp
    <li class="side-nav-item nav-item {{ areActiveRoutes($scholarshipActiveRoutes, 'tt-menu-item-active') }}">
        <a href="{{ route('admin.scholarship.index') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="book-open"></i></span>
            <span class="tt-nav-link-text">{{ localize('Scholarship') }}</span>
        </a>
    </li>


    <!--  winners -->

    @php
    $winnersActiveRoutes = ['admin.winners.index', 'admin.winners.create', 'admin.winners.edit'];
    @endphp
    <li class="side-nav-item nav-item {{ areActiveRoutes($winnersActiveRoutes, 'tt-menu-item-active') }}">
        <a href="{{ route('admin.winners.index') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="award"></i></span>
            <span class="tt-nav-link-text">{{ localize('Winner') }}</span>
        </a>
    </li>


    <!--  gallery -->

  
    @php
      $galleryActiveRoutes = ['admin.gallery.index', 'admin.gallery.create', 'admin.gallery.edit'];

    @endphp
    <li class="side-nav-item nav-item {{ areActiveRoutes($galleryActiveRoutes, 'tt-menu-item-active') }}">
        <a href="{{ route('admin.gallery.index') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="folder"></i></span>
            <span class="tt-nav-link-text">{{ localize('Gallery') }}</span>
        </a>
    </li>


    @php
    $testimonialActiveRoutes = ['admin.testimonial.index', 'admin.testimonial.create', 'admin.testimonial.edit'];
   @endphp
   <li class="side-nav-item nav-item {{ areActiveRoutes($testimonialActiveRoutes, 'tt-menu-item-active') }}">
      <a href="{{ route('admin.testimonial.index') }}" class="side-nav-link">
          <span class="tt-nav-link-icon"><i data-feather="user"></i></span>
          <span class="tt-nav-link-text">{{ localize('Testimonial') }}</span>
      </a>
   </li>


    <!--  Coordinator -->
    <li class="side-nav-item">
        <a href="{{ route('admin.coordinator.index') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"> <i data-feather="folder"></i></span>
            <span class="tt-nav-link-text">{{ localize('Coordinator') }}</span>
        </a>
    </li>

     <!--  Enquiry -->
    <li class="side-nav-item">
        <a href="{{ route('admin.contact.index') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"> <i data-feather="folder"></i></span>
            <span class="tt-nav-link-text">{{ localize('Enquiry') }}</span>
        </a>
    </li>

       <!--  Payment -->
       <li class="side-nav-item">
        <a href="{{ route('admin.transaction.index') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"> <i data-feather="credit-card"></i></span>
            <span class="tt-nav-link-text">{{ localize('Transaction') }}</span>
        </a>
    </li>
    
  <!-- pages -->
  @php
  $pagesActiveRoutes = ['admin.pages.index', 'admin.pages.create', 'admin.pages.edit'];
  @endphp
  @can('pages')
  <li class="side-nav-item nav-item {{ areActiveRoutes($pagesActiveRoutes, 'tt-menu-item-active') }}">
      <a href="{{ route('admin.pages.index') }}" class="side-nav-link">
          <span class="tt-nav-link-icon"> <i data-feather="copy"></i></span>
          <span class="tt-nav-link-text">{{ localize('Pages') }}</span>
      </a>
  </li>
  @endcan

    <!-- Blog Systems -->
    @php
        $blogActiveRoutes = ['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit','admin.events.index', 'admin.events.create', 'admin.events.edit'];
    @endphp
    @canany(['blogs'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($blogActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#blogSystem"
                aria-expanded="{{ areActiveRoutes($blogActiveRoutes, 'true') }}" aria-controls="blogSystem"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="file-text"></i></span>
                <span class="tt-nav-link-text">{{ localize('Blogs') }}</span>
            </a>
            <div class="collapse {{ areActiveRoutes($blogActiveRoutes, 'show') }}" id="blogSystem">
                <ul class="side-nav-second-level">
                    @can('blogs')
                        <li
                            class="{{ areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.blogs.index') }}"
                                class="{{ areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit']) }}">{{ localize('All Blogs') }}</a>
                        </li>
                    @endcan

                    <li
                    class="{{ areActiveRoutes(['admin.events.index', 'admin.events.create', 'admin.events.edit'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.events.index') }}"
                        class="{{ areActiveRoutes(['admin.events.index', 'admin.events.create', 'admin.events.edit']) }}">{{ localize('All Events') }}</a>
                </li>

                </ul>
            </div>
        </li>
    @endcan

   {{-- end SSO   --}}

    {{-- SKL --}}


   @php
   $quizeActiveRoutes = [
       'admin.quize.index',
       'admin.quize.create',
       'admin.quize.edit',
       'admin.levels.index',
       'admin.levels.create',
       'admin.levels.edit',
       'admin.questions.index',
       'admin.questions.create',
       'admin.questions.edit',
       'admin.participant.index',
       'admin.participant.create',
       'admin.participant.edit',
   ];
@endphp

<li class="side-nav-title side-nav-item nav-item">
    <span class="tt-nav-title-text">{{ localize('Sports Knowledge League') }} (SKL)</span>
</li>


<li class="side-nav-item nav-item {{ areActiveRoutes($quizeActiveRoutes, 'tt-menu-item-active') }}">
   <a data-bs-toggle="collapse" href="#quizeSystem" aria-expanded="{{ areActiveRoutes($quizeActiveRoutes, 'true') }}"
       aria-controls="quizeSystem" class="side-nav-link tt-menu-toggle">
       <span class="tt-nav-link-icon"><i data-feather="file-text"></i></span>
       <span class="tt-nav-link-text">{{ localize('SKL') }}</span>
   </a>
   <div class="collapse {{ areActiveRoutes($quizeActiveRoutes, 'show') }}" id="quizeSystem">
       <ul class="side-nav-second-level">

           <li
               class="{{ areActiveRoutes(['admin.levels.index', 'admin.levels.create', 'admin.levels.edit'], 'tt-menu-item-active') }}">
               <a href="{{ route('admin.levels.index') }}"
                   class="{{ areActiveRoutes(['admin.levels.index', 'admin.levels.create', 'admin.levels.edit']) }}">{{ localize('Levels') }}</a>
           </li>
           <li
               class="{{ areActiveRoutes(['admin.quize.index', 'admin.quize.create', 'admin.quize.edit'], 'tt-menu-item-active') }}">
               <a href="{{ route('admin.quize.index') }}"
                   class="{{ areActiveRoutes(['admin.quize.index', 'admin.quize.create', 'admin.quize.edit']) }}">{{ localize('All Quiz') }}</a>
           </li>

           <li
               class="{{ areActiveRoutes(['admin.questions.index', 'admin.questions.create', 'admin.questions.edit'], 'tt-menu-item-active') }}">
               <a href="{{ route('admin.questions.index') }}"
                   class="{{ areActiveRoutes(['admin.questions.index', 'admin.questions.create', 'admin.questions.edit']) }}">{{ localize('Quiz Question') }}</a>
           </li>

           <li
               class="{{ areActiveRoutes(['admin.participant.index', 'admin.participant.create', 'admin.participant.edit'], 'tt-menu-item-active') }}">
               <a href="{{ route('admin.participant.index') }}"
                   class="{{ areActiveRoutes(['admin.participant.index', 'admin.participant.create', 'admin.participant.edit']) }}">{{ localize('Quiz Participant') }}</a>
           </li>
       </ul>
   </div>

</li>

{{-- end SKL --}}



    <!-- Settings -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">{{ localize('Settings') }}</span>
    </li>

    <!-- media manager -->
    @can('media_manager')
        <li class="side-nav-item">
            <a href="{{ route('admin.mediaManager.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="folder"></i></span>
                <span class="tt-nav-link-text">{{ localize('Media Manager') }}</span>
            </a>
        </li>
    @endcan

    <!-- Appearance -->
    {{-- @php
        $appearanceActiveRoutes = [
            'admin.appearance.header',
            'admin.appearance.homepage.hero',
            'admin.appearance.homepage.editHero',
            'admin.appearance.homepage.topCategories',
            'admin.appearance.homepage.topTrendingProducts',
            'admin.appearance.homepage.featuredProducts',
            'admin.appearance.homepage.bestDeals',
            'admin.appearance.homepage.bestSelling',
            'admin.appearance.products.details.editWidget',
            'admin.appearance.homepage.content',
        ];

        $homepageActiveRoutes = [
            'admin.appearance.homepage.hero',
            'admin.appearance.homepage.editHero',
            'admin.appearance.homepage.topCategories',
            'admin.appearance.homepage.topTrendingProducts',
            'admin.appearance.homepage.featuredProducts',
            'admin.appearance.homepage.bestDeals',
            'admin.appearance.homepage.bestSelling',
            'admin.appearance.homepage.content',
        ];

    @endphp

    @canany(['homepage', 'header', 'footer'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($appearanceActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#Appearance"
                aria-expanded="{{ areActiveRoutes($appearanceActiveRoutes, 'true') }}" aria-controls="Appearance"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="layout"></i></span>
                <span class="tt-nav-link-text">{{ localize('Appearance') }}</span>
            </a>
            <div class="collapse {{ areActiveRoutes($appearanceActiveRoutes, 'show') }}" id="Appearance">
                <ul class="side-nav-second-level">

                    @can('homepage')
                        <li class="{{ areActiveRoutes($homepageActiveRoutes, 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.homepage.hero') }}"
                                class="{{ areActiveRoutes($homepageActiveRoutes) }}">{{ localize('Homepage') }}</a>
                        </li>
                    @endcan

                    @can('header')
                        <li class="{{ areActiveRoutes(['admin.appearance.header'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.header') }}"
                                class="{{ areActiveRoutes(['admin.appearance.header']) }}">{{ localize('Header') }}</a>
                        </li>
                    @endcan

                    @can('footer')
                        <li class="{{ areActiveRoutes(['admin.appearance.footer'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.footer') }}"
                                class="{{ areActiveRoutes(['admin.appearance.footer']) }}">{{ localize('Footer') }}</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcanany --}}

    <!-- Roles & Permission -->
    @php
        $rolesActiveRoutes = ['admin.roles.index', 'admin.roles.create', 'admin.roles.edit'];
    @endphp
    @can('roles_and_permissions')
        <li class="side-nav-item nav-item {{ areActiveRoutes($rolesActiveRoutes, 'tt-menu-item-active') }}">
            <a href="{{ route('admin.roles.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="unlock"></i></span>
                <span class="tt-nav-link-text">{{ localize('Roles & Permissions') }}</span>
            </a>
        </li>
    @endcan

    <!-- system settings -->
    @php
        $settingsActiveRoutes = ['admin.generalSettings', 'admin.orderSettings', 'admin.smtpSettings.index'];
    @endphp

    @canany(['smtp_settings', 'sms_settings', 'general_settings', 'currency_settings', 'language_settings'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($settingsActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#systemSetting"
                aria-expanded="{{ areActiveRoutes($settingsActiveRoutes, 'true') }}" aria-controls="systemSetting"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="settings"></i></span>
                <span class="tt-nav-link-text">{{ localize('System Settings') }}</span>
            </a>
            <div class="collapse {{ areActiveRoutes($settingsActiveRoutes, 'show') }}" id="systemSetting">
                <ul class="side-nav-second-level">

                    {{-- @can('sms_settings')
                        <li class="{{ areActiveRoutes(['admin.settings.smsSettings'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.settings.smsSettings') }}"
                                class="{{ areActiveRoutes(['admin.settings.smsSettings']) }}">{{ localize('SMS Settings') }}</a>
                        </li>
                    @endcan --}}

                    {{-- @can('order_settings')
                <li
                    class="{{ areActiveRoutes(['admin.orderSettings', 'admin.timeslot.edit'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.orderSettings') }}"
                        class="{{ areActiveRoutes(['admin.generalSettings']) }}">{{ localize('Enquiry Settings') }}</a>
                </li>
                @endcan --}}

                    <li class="d-none {{ areActiveRoutes(['admin.smtpSettings.index'], 'tt-menu-item-active') }}">
                        <a href="{{ route('admin.smtpSettings.index') }}"
                            class="{{ areActiveRoutes(['admin.smtpSettings.index']) }}">{{ localize('Admin Store') }}</a>
                    </li>

                    @can('smtp_settings')
                        <li class="{{ areActiveRoutes(['admin.smtpSettings.index'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.smtpSettings.index') }}"
                                class="{{ areActiveRoutes(['admin.smtpSettings.index']) }}">{{ localize('SMTP Settings') }}</a>
                        </li>
                    @endcan

                    @can('general_settings')
                        <li class="{{ areActiveRoutes(['admin.generalSettings'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.generalSettings') }}"
                                class="{{ areActiveRoutes(['admin.generalSettings']) }}">{{ localize('General Settings') }}</a>
                        </li>
                    @endcan

                    {{-- @can('payment_settings')
                <li class="{{ areActiveRoutes(['admin.settings.paymentMethods'], 'tt-menu-item-active') }}">
                    <a href="{{ route('admin.settings.paymentMethods') }}"
                        class="{{ areActiveRoutes(['admin.settings.paymentMethods']) }}">{{ localize('Payment Methods')
                        }}</a>
                </li>
                @endcan --}}
                </ul>
            </div>
        </li>
    @endcan


</ul>
