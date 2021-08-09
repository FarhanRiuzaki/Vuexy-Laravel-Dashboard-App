@extends('layouts/contentLayoutMaster')

@section('title', 'Scroll')

@section('content')
<div class="app-content content">
    <div class="sidebar-right sidebar-sticky">
        <div class="sidebar">
            <div class="pt-2 pe-2">
                <div class="sidebar-content p-1" data-spy="affix" data-offset-top="-77">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Laravel Integration</h6>
                        </div>
                        <div class="card-body">
                            <nav id="sidebar-page-navigation">
                                <ul id="page-navigation-list" class="nav">
                                    <li class="nav-item"><a class="nav-link" href="#configuration">Configuration</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#custom-css">Custom Css</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#create-new-page">Create New Page</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#rtl">RTL</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-detached content-left">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Laravel Integration</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Laravel</a></li>
                                <li class="breadcrumb-item active">Laravel Integration</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Configuration -->
            <div class="card">
                <div class="card-header">
                    <h4 id="configuration" class="card-title">Configuration</h4>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show" aria-expanded="true">
                    <div class="card-body">
                        <div class="card-text">
                            <p>Configuration Options in details:</p>
                            <div class="alert alert-primary mb-2" role="alert">
                                <div class="alert-body">
                                    Global configurations can be configured via <code>custom.php</code> file found at
                                    <code>config -> custom.php</code> path. To override these global configurations on a
                                    page, you
                                    can add page configurations via
                                    <code>App -> Http -> Controller -> {Controller File}</code> file.
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Key</th>
                                            <th>Possible Options</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>mainLayoutType</td>
                                            <td>vertical(default), horizontal</td>
                                            <td>
                                                To switch vertical/horizontal layout. By defaul this will work with
                                                vertical layout.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>theme</td>
                                            <td>light (default) / dark / semi-dark/ bordered</td>
                                            <td>Set between light theme, dark theme, semi-dark and bordered theme.</td>
                                        </tr>
                                        <tr>
                                            <td>sidebarCollapsed</td>
                                            <td>true / false (default)</td>
                                            <td>Toggle display of collapse or expand.</td>
                                        </tr>
                                        <tr>
                                            <td>navbarColor</td>
                                            <td>bg-{primary/info/success/danger/warning}</td>
                                            <td>Change the color of the navbar using available options.</td>
                                        </tr>
                                        <tr>
                                            <td>horizontalMenuType</td>
                                            <td>floating (default), static,sticky</td>
                                            <td>Change how the menu is displayed only in Horizontal-menu Template.</td>
                                        </tr>
                                        <tr>
                                            <td>verticalMenuNavbarType</td>
                                            <td>floating (default), static, sticky, hidden</td>
                                            <td>Change how the navbar is displayed only in Vertical-menu Template.</td>
                                        </tr>
                                        <tr>
                                            <td>footerType</td>
                                            <td>static (default), sticky, hidden</td>
                                            <td>Change how the footer is displayed.</td>
                                        </tr>
                                        <tr>
                                            <td>layoutWidth</td>
                                            <td>boxed (default), full</td>
                                            <td>Change how the layout is displayed.</td>
                                        </tr>
                                        <tr>
                                            <td>showMenu</td>
                                            <td>true (default), false</td>
                                            <td>Toggle the main menu. (Warning: if set to false it will hide the main
                                                menu)</td>
                                        </tr>
                                        <tr>
                                            <td>bodyClass</td>
                                            <td>' '(default)</td>
                                            <td colspan="2">
                                                Using this variable, you can add your own custom class to include in
                                                <code>&lt;body&gt;</code> tag.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>pageHeader</td>
                                            <td>true(default), false</td>
                                            <td>This option is used to show breadcrumb.</td>
                                        </tr>
                                        <tr>
                                            <td>contentLayout</td>
                                            <td>
                                                default(default), content-left-sidebar, content-right-sidebar,
                                                content-detached-left-sidebar, content-detached-right-sidebar
                                            </td>
                                            <td>
                                                Use 'default' options for default layout and sidebar. Only use these
                                                options except
                                                'default' if your whole Project has the same layout otherwise override
                                                these options as
                                                page level.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>blankPage</td>
                                            <td>true, false(default)</td>
                                            <td>
                                                Pages that don't require to show header, footer, sidebar will be done by
                                                "blankPage" value
                                                to "true". For example: Login, register, etc pages need this option
                                                value to be true on
                                                page level.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>defaultLanguage</td>
                                            <td>en(default),fr,pt,de</td>
                                            <td>To change the default language in whole Template.</td>
                                        </tr>
                                        <tr>
                                            <td>direction</td>
                                            <td>env('MIX_CONTENT_DIRECTION', 'ltr')(default),
                                                env('MIX_CONTENT_DIRECTION', 'rtl')</td>
                                            <td>
                                                To switch ltr/rtl direction of the layout. By defaul this will work with
                                                LTR layout.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="control-config" class="mt-2">
                                <h6>Change for Page Level Configuration :</h6>
                                <p>
                                    If you want to add Page level configuration for layout, you need to to set array for
                                    page
                                    configuration in
                                    <code>app -> Http -> Controller -> {Controller file}</code> and send it to your
                                    view.
                                </p>
                            </div>
                            <pre class="language-php">
                            <code class="language-php">
                            public function {functionName}(){
                                $pageConfigs = [
                                    'theme' => 'dark',
                                    'navbarColor' => 'bg-primary',
                                    'navbarType' => 'static',
                                    'footerType' => 'sticky',
                                    'bodyClass' => 'testClass'
                                ];

                                return view('/pages/testPage', [
                                    'pageConfigs' => $pageConfigs
                                ]);
                            }
                            </code>
                            </pre>
                            <p class="mt-2">
                                We have provided <code>'pageClass' => '',</code> options to add page specific class with
                                <code>.app-content</code> . You can only override this options in page level.
                            </p>
                            <pre class="language-php">
                            <code class="language-php">
                            public function {functionName}(){
                            $pageConfigs = [
                            'pageClass' => 'email-application'
                            ];

                            return view('/pages/testPage', ['pageConfigs' => $pageConfigs]);
                            }
                            </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Configuration -->
@endsection
