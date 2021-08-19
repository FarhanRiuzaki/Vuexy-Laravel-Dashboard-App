@extends('layouts.landingPageDoc')

@section('title', 'Documentation API')

@section('page-styles')
<style>
    @media (min-width: 992px){
        .bd-toc {
            position: -webkit-sticky;
            position: sticky;
            top: 5.3rem;
            right: 0;
            z-index: 2;
            height: calc(100vh - 7rem);
            overflow-y: auto;
        }
    }

    @media (min-width: 768px){
        .bd-links {
            position: -webkit-sticky;
            position: sticky;
            top: 5.2rem;
            display: block !important;
            height: calc(100vh - 7rem);
            padding-left: .25rem;
            margin-left: -.25rem;
            overflow-y: auto;
        }
    }
    .navbar {
        padding-top: 0rem;
        padding-bottom: 0rem;
        box-shadow: 0 0 5px rgb(0 0 0 / 21%);
    }
    @media (min-width: 992px){
        .navbar-expand-lg .navbar-nav .nav-link {
            padding-right: 1.2rem;
            padding-left: 1.2rem;
        }
    }
    .btn-outline {
        color: #cd8735;
        border-color: #cd8735;
    }
    .st-nav a {
        text-decoration: none;
        -webkit-tap-highlight-color: transparent;
        color: #3f179a;
        -webkit-transition: color 0.1s;
        transition: color 0.1s;
    }
    .btn-rounded {
        border-radius: 10rem;
    }
    .px-3 {
        padding-right: 1rem !important;
        padding-left: 1rem !important;
    }
    .me-3 {
        margin-right: 1rem !important;
    }
    .btn-solid {
        color: #fff;
        background-color: #cd8735;
        border-color: #cd8735;
    }
    @media (min-width: 1200px){
        .container-xl, .container-lg, .container-md, .container-sm, .container {
            max-width: 1260px;
        }
    }
</style>
@endsection

@section('content')

<body>
    <div class="skippy visually-hidden-focusable overflow-hidden">
        <div class="container-xl">
            <a class="d-inline-flex p-2 m-1" href="#content">Skip to main content</a>
            <a class="d-none d-md-inline-flex p-2 m-1" href="#bd-docs-nav">Skip to docs navigation</a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white box-shadow-1">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('landingPage/img/logo-light.png') }}" alt="" style="max-height: 50px">
            </a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Mulai Sekarang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Dokumentasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Studi Kasus</a>
                    </li>
                </ul>
                <a class="btn btn-rounded btn-outline me-3 px-3" href="login.html" target="_blank">
                    <span class="d-md-none d-lg-inline">Login</span>
                </a>
                <a class="btn btn-rounded btn-solid px-3" href="signup.html" target="_blank">
                    <span class="d-md-none d-lg-inline">Signup</span>
                </a>
                {{-- <button class="btn btn-outline-success" type="submit">Search</button>
                <button class="btn btn-outline-success" type="submit">Search</button> --}}
            </div>
        </div>
      </nav>

    <div class="container-xxl my-md-4 bd-layout">
        <aside class="bd-sidebar">
            <nav class="collapse bd-links" id="bd-docs-nav" aria-label="Docs navigation">
                <ul class="list-unstyled mb-0 py-3 pt-md-1">
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded" data-bs-toggle="collapse"
                            data-bs-target="#getting-started-collapse" aria-expanded="true" aria-current="true">
                            Getting started
                        </button>

                        <div class="collapse show" id="getting-started-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/getting-started/introduction/"
                                        class="d-inline-flex align-items-center rounded active"
                                        aria-current="page">Introduction</a></li>
                                <li><a href="/docs/5.1/getting-started/download/"
                                        class="d-inline-flex align-items-center rounded">Download</a></li>
                                <li><a href="/docs/5.1/getting-started/contents/"
                                        class="d-inline-flex align-items-center rounded">Contents</a></li>
                                <li><a href="/docs/5.1/getting-started/browsers-devices/"
                                        class="d-inline-flex align-items-center rounded">Browsers &amp; devices</a></li>
                                <li><a href="/docs/5.1/getting-started/javascript/"
                                        class="d-inline-flex align-items-center rounded">JavaScript</a></li>
                                <li><a href="/docs/5.1/getting-started/webpack/"
                                        class="d-inline-flex align-items-center rounded">Webpack</a></li>
                                <li><a href="/docs/5.1/getting-started/parcel/"
                                        class="d-inline-flex align-items-center rounded">Parcel</a></li>
                                <li><a href="/docs/5.1/getting-started/accessibility/"
                                        class="d-inline-flex align-items-center rounded">Accessibility</a></li>
                                <li><a href="/docs/5.1/getting-started/rfs/"
                                        class="d-inline-flex align-items-center rounded">RFS</a></li>
                                <li><a href="/docs/5.1/getting-started/rtl/"
                                        class="d-inline-flex align-items-center rounded">RTL</a></li>
                                <li><a href="/docs/5.1/getting-started/contribute/"
                                        class="d-inline-flex align-items-center rounded">Contribute</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#customize-collapse" aria-expanded="false">
                            Customize
                        </button>

                        <div class="collapse" id="customize-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/customize/overview/"
                                        class="d-inline-flex align-items-center rounded">Overview</a></li>
                                <li><a href="/docs/5.1/customize/sass/"
                                        class="d-inline-flex align-items-center rounded">Sass</a></li>
                                <li><a href="/docs/5.1/customize/options/"
                                        class="d-inline-flex align-items-center rounded">Options</a></li>
                                <li><a href="/docs/5.1/customize/color/"
                                        class="d-inline-flex align-items-center rounded">Color</a></li>
                                <li><a href="/docs/5.1/customize/components/"
                                        class="d-inline-flex align-items-center rounded">Components</a></li>
                                <li><a href="/docs/5.1/customize/css-variables/"
                                        class="d-inline-flex align-items-center rounded">CSS variables</a></li>
                                <li><a href="/docs/5.1/customize/optimize/"
                                        class="d-inline-flex align-items-center rounded">Optimize</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#layout-collapse" aria-expanded="false">
                            Layout
                        </button>

                        <div class="collapse" id="layout-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/layout/breakpoints/"
                                        class="d-inline-flex align-items-center rounded">Breakpoints</a></li>
                                <li><a href="/docs/5.1/layout/containers/"
                                        class="d-inline-flex align-items-center rounded">Containers</a></li>
                                <li><a href="/docs/5.1/layout/grid/"
                                        class="d-inline-flex align-items-center rounded">Grid</a></li>
                                <li><a href="/docs/5.1/layout/columns/"
                                        class="d-inline-flex align-items-center rounded">Columns</a></li>
                                <li><a href="/docs/5.1/layout/gutters/"
                                        class="d-inline-flex align-items-center rounded">Gutters</a></li>
                                <li><a href="/docs/5.1/layout/utilities/"
                                        class="d-inline-flex align-items-center rounded">Utilities</a></li>
                                <li><a href="/docs/5.1/layout/z-index/"
                                        class="d-inline-flex align-items-center rounded">Z-index</a></li>
                                <li><a href="/docs/5.1/layout/css-grid/"
                                        class="d-inline-flex align-items-center rounded">CSS Grid</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#content-collapse" aria-expanded="false">
                            Content
                        </button>

                        <div class="collapse" id="content-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/content/reboot/"
                                        class="d-inline-flex align-items-center rounded">Reboot</a></li>
                                <li><a href="/docs/5.1/content/typography/"
                                        class="d-inline-flex align-items-center rounded">Typography</a></li>
                                <li><a href="/docs/5.1/content/images/"
                                        class="d-inline-flex align-items-center rounded">Images</a></li>
                                <li><a href="/docs/5.1/content/tables/"
                                        class="d-inline-flex align-items-center rounded">Tables</a></li>
                                <li><a href="/docs/5.1/content/figures/"
                                        class="d-inline-flex align-items-center rounded">Figures</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#forms-collapse" aria-expanded="false">
                            Forms
                        </button>

                        <div class="collapse" id="forms-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/forms/overview/"
                                        class="d-inline-flex align-items-center rounded">Overview</a></li>
                                <li><a href="/docs/5.1/forms/form-control/"
                                        class="d-inline-flex align-items-center rounded">Form control</a></li>
                                <li><a href="/docs/5.1/forms/select/"
                                        class="d-inline-flex align-items-center rounded">Select</a></li>
                                <li><a href="/docs/5.1/forms/checks-radios/"
                                        class="d-inline-flex align-items-center rounded">Checks &amp; radios</a></li>
                                <li><a href="/docs/5.1/forms/range/"
                                        class="d-inline-flex align-items-center rounded">Range</a></li>
                                <li><a href="/docs/5.1/forms/input-group/"
                                        class="d-inline-flex align-items-center rounded">Input group</a></li>
                                <li><a href="/docs/5.1/forms/floating-labels/"
                                        class="d-inline-flex align-items-center rounded">Floating labels</a></li>
                                <li><a href="/docs/5.1/forms/layout/"
                                        class="d-inline-flex align-items-center rounded">Layout</a></li>
                                <li><a href="/docs/5.1/forms/validation/"
                                        class="d-inline-flex align-items-center rounded">Validation</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#components-collapse" aria-expanded="false">
                            Components
                        </button>

                        <div class="collapse" id="components-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/components/accordion/"
                                        class="d-inline-flex align-items-center rounded">Accordion</a></li>
                                <li><a href="/docs/5.1/components/alerts/"
                                        class="d-inline-flex align-items-center rounded">Alerts</a></li>
                                <li><a href="/docs/5.1/components/badge/"
                                        class="d-inline-flex align-items-center rounded">Badge</a></li>
                                <li><a href="/docs/5.1/components/breadcrumb/"
                                        class="d-inline-flex align-items-center rounded">Breadcrumb</a></li>
                                <li><a href="/docs/5.1/components/buttons/"
                                        class="d-inline-flex align-items-center rounded">Buttons</a></li>
                                <li><a href="/docs/5.1/components/button-group/"
                                        class="d-inline-flex align-items-center rounded">Button group</a></li>
                                <li><a href="/docs/5.1/components/card/"
                                        class="d-inline-flex align-items-center rounded">Card</a></li>
                                <li><a href="/docs/5.1/components/carousel/"
                                        class="d-inline-flex align-items-center rounded">Carousel</a></li>
                                <li><a href="/docs/5.1/components/close-button/"
                                        class="d-inline-flex align-items-center rounded">Close button</a></li>
                                <li><a href="/docs/5.1/components/collapse/"
                                        class="d-inline-flex align-items-center rounded">Collapse</a></li>
                                <li><a href="/docs/5.1/components/dropdowns/"
                                        class="d-inline-flex align-items-center rounded">Dropdowns</a></li>
                                <li><a href="/docs/5.1/components/list-group/"
                                        class="d-inline-flex align-items-center rounded">List group</a></li>
                                <li><a href="/docs/5.1/components/modal/"
                                        class="d-inline-flex align-items-center rounded">Modal</a></li>
                                <li><a href="/docs/5.1/components/navs-tabs/"
                                        class="d-inline-flex align-items-center rounded">Navs &amp; tabs</a></li>
                                <li><a href="/docs/5.1/components/navbar/"
                                        class="d-inline-flex align-items-center rounded">Navbar</a></li>
                                <li><a href="/docs/5.1/components/offcanvas/"
                                        class="d-inline-flex align-items-center rounded">Offcanvas</a></li>
                                <li><a href="/docs/5.1/components/pagination/"
                                        class="d-inline-flex align-items-center rounded">Pagination</a></li>
                                <li><a href="/docs/5.1/components/placeholders/"
                                        class="d-inline-flex align-items-center rounded">Placeholders</a></li>
                                <li><a href="/docs/5.1/components/popovers/"
                                        class="d-inline-flex align-items-center rounded">Popovers</a></li>
                                <li><a href="/docs/5.1/components/progress/"
                                        class="d-inline-flex align-items-center rounded">Progress</a></li>
                                <li><a href="/docs/5.1/components/scrollspy/"
                                        class="d-inline-flex align-items-center rounded">Scrollspy</a></li>
                                <li><a href="/docs/5.1/components/spinners/"
                                        class="d-inline-flex align-items-center rounded">Spinners</a></li>
                                <li><a href="/docs/5.1/components/toasts/"
                                        class="d-inline-flex align-items-center rounded">Toasts</a></li>
                                <li><a href="/docs/5.1/components/tooltips/"
                                        class="d-inline-flex align-items-center rounded">Tooltips</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#helpers-collapse" aria-expanded="false">
                            Helpers
                        </button>

                        <div class="collapse" id="helpers-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/helpers/clearfix/"
                                        class="d-inline-flex align-items-center rounded">Clearfix</a></li>
                                <li><a href="/docs/5.1/helpers/colored-links/"
                                        class="d-inline-flex align-items-center rounded">Colored links</a></li>
                                <li><a href="/docs/5.1/helpers/ratio/"
                                        class="d-inline-flex align-items-center rounded">Ratio</a></li>
                                <li><a href="/docs/5.1/helpers/position/"
                                        class="d-inline-flex align-items-center rounded">Position</a></li>
                                <li><a href="/docs/5.1/helpers/stacks/"
                                        class="d-inline-flex align-items-center rounded">Stacks</a></li>
                                <li><a href="/docs/5.1/helpers/visually-hidden/"
                                        class="d-inline-flex align-items-center rounded">Visually hidden</a></li>
                                <li><a href="/docs/5.1/helpers/stretched-link/"
                                        class="d-inline-flex align-items-center rounded">Stretched link</a></li>
                                <li><a href="/docs/5.1/helpers/text-truncation/"
                                        class="d-inline-flex align-items-center rounded">Text truncation</a></li>
                                <li><a href="/docs/5.1/helpers/vertical-rule/"
                                        class="d-inline-flex align-items-center rounded">Vertical rule</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#utilities-collapse" aria-expanded="false">
                            Utilities
                        </button>

                        <div class="collapse" id="utilities-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/utilities/api/"
                                        class="d-inline-flex align-items-center rounded">API</a></li>
                                <li><a href="/docs/5.1/utilities/background/"
                                        class="d-inline-flex align-items-center rounded">Background</a></li>
                                <li><a href="/docs/5.1/utilities/borders/"
                                        class="d-inline-flex align-items-center rounded">Borders</a></li>
                                <li><a href="/docs/5.1/utilities/colors/"
                                        class="d-inline-flex align-items-center rounded">Colors</a></li>
                                <li><a href="/docs/5.1/utilities/display/"
                                        class="d-inline-flex align-items-center rounded">Display</a></li>
                                <li><a href="/docs/5.1/utilities/flex/"
                                        class="d-inline-flex align-items-center rounded">Flex</a></li>
                                <li><a href="/docs/5.1/utilities/float/"
                                        class="d-inline-flex align-items-center rounded">Float</a></li>
                                <li><a href="/docs/5.1/utilities/interactions/"
                                        class="d-inline-flex align-items-center rounded">Interactions</a></li>
                                <li><a href="/docs/5.1/utilities/opacity/"
                                        class="d-inline-flex align-items-center rounded">Opacity</a></li>
                                <li><a href="/docs/5.1/utilities/overflow/"
                                        class="d-inline-flex align-items-center rounded">Overflow</a></li>
                                <li><a href="/docs/5.1/utilities/position/"
                                        class="d-inline-flex align-items-center rounded">Position</a></li>
                                <li><a href="/docs/5.1/utilities/shadows/"
                                        class="d-inline-flex align-items-center rounded">Shadows</a></li>
                                <li><a href="/docs/5.1/utilities/sizing/"
                                        class="d-inline-flex align-items-center rounded">Sizing</a></li>
                                <li><a href="/docs/5.1/utilities/spacing/"
                                        class="d-inline-flex align-items-center rounded">Spacing</a></li>
                                <li><a href="/docs/5.1/utilities/text/"
                                        class="d-inline-flex align-items-center rounded">Text</a></li>
                                <li><a href="/docs/5.1/utilities/vertical-align/"
                                        class="d-inline-flex align-items-center rounded">Vertical align</a></li>
                                <li><a href="/docs/5.1/utilities/visibility/"
                                        class="d-inline-flex align-items-center rounded">Visibility</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#extend-collapse" aria-expanded="false">
                            Extend
                        </button>

                        <div class="collapse" id="extend-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/extend/approach/"
                                        class="d-inline-flex align-items-center rounded">Approach</a></li>
                                <li><a href="/docs/5.1/extend/icons/"
                                        class="d-inline-flex align-items-center rounded">Icons</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#about-collapse" aria-expanded="false">
                            About
                        </button>

                        <div class="collapse" id="about-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="/docs/5.1/about/overview/"
                                        class="d-inline-flex align-items-center rounded">Overview</a></li>
                                <li><a href="/docs/5.1/about/team/"
                                        class="d-inline-flex align-items-center rounded">Team</a></li>
                                <li><a href="/docs/5.1/about/brand/"
                                        class="d-inline-flex align-items-center rounded">Brand</a></li>
                                <li><a href="/docs/5.1/about/license/"
                                        class="d-inline-flex align-items-center rounded">License</a></li>
                                <li><a href="/docs/5.1/about/translations/"
                                        class="d-inline-flex align-items-center rounded">Translations</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="my-3 mx-4 border-top"></li>
                    <li>
                        <a href="/docs/5.1/migration/" class="d-inline-flex align-items-center rounded">
                            Migration
                        </a>
                    </li>
                </ul>
            </nav>

        </aside>

        <main class="bd-main order-1">
            <div class="bd-intro ps-lg-4 " style="margin-top: 50px">
                <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                    <a class="btn btn-sm btn-bd-light mb-2 mb-md-0"
                        href="https://github.com/twbs/bootstrap/blob/main/site/content/docs/5.1/getting-started/introduction.md"
                        title="View and edit this file on GitHub" target="_blank" rel="noopener">View on GitHub</a>
                    <h1 class="bd-title" id="content">Introduction</h1>
                </div>
                <p class="bd-lead">Get started with Bootstrap, the world&rsquo;s most popular framework for building
                    responsive, mobile-first sites, with jsDelivr and a template starter page.</p>
                <script async src="https://cdn.carbonads.com/carbon.js?serve=CKYIKKJL&placement=getbootstrapcom"
                    id="_carbonads_js"></script>

            </div>


            <div class="bd-toc mt-4 mb-5 my-md-0 ps-xl-3 mb-lg-5 text-muted">
                <strong class="d-block h6 my-2 pb-2 border-bottom">On this page</strong>
                <nav id="TableOfContents">
                    <ul>
                        <li><a href="#quick-start">Quick start</a>
                            <ul>
                                <li><a href="#css">CSS</a></li>
                                <li><a href="#js">JS</a>
                                    <ul>
                                        <li><a href="#bundle">Bundle</a></li>
                                        <li><a href="#separate">Separate</a></li>
                                        <li><a href="#modules">Modules</a></li>
                                        <li><a href="#components">Components</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#starter-template">Starter template</a></li>
                        <li><a href="#important-globals">Important globals</a>
                            <ul>
                                <li><a href="#html5-doctype">HTML5 doctype</a></li>
                                <li><a href="#responsive-meta-tag">Responsive meta tag</a></li>
                                <li><a href="#box-sizing">Box-sizing</a></li>
                                <li><a href="#reboot">Reboot</a></li>
                            </ul>
                        </li>
                        <li><a href="#community">Community</a></li>
                    </ul>
                </nav>
            </div>


            <div class="bd-content ps-lg-4">


                <h2 id="quick-start">Quick start</h2>
                <p>Looking to quickly add Bootstrap to your project? Use jsDelivr, a free open source CDN. Using a
                    package manager or need to download the source files? <a
                        href="/docs/5.1/getting-started/download/">Head to the downloads page</a>.</p>
                <h3 id="css">CSS</h3>
                <p>Copy-paste the stylesheet <code>&lt;link&gt;</code> into your <code>&lt;head&gt;</code> before all
                    other stylesheets to load our CSS.</p>
                <div class="highlight">
                    <pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="p">&lt;</span><span class="nt">link</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css&#34;</span> <span class="na">rel</span><span class="o">=</span><span class="s">&#34;stylesheet&#34;</span> <span class="na">integrity</span><span class="o">=</span><span class="s">&#34;sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We&#34;</span> <span class="na">crossorigin</span><span class="o">=</span><span class="s">&#34;anonymous&#34;</span><span class="p">&gt;</span>
</code></pre>
                </div>
                <h3 id="js">JS</h3>
                <p>Many of our components require the use of JavaScript to function. Specifically, they require our own
                    JavaScript plugins and <a href="https://popper.js.org/">Popper</a>. Place <strong>one of the
                        following <code>&lt;script&gt;</code>s</strong> near the end of your pages, right before the
                    closing <code>&lt;/body&gt;</code> tag, to enable them.</p>
                <h4 id="bundle">Bundle</h4>
                <p>Include every Bootstrap JavaScript plugin and dependency with one of our two bundles. Both
                    <code>bootstrap.bundle.js</code> and <code>bootstrap.bundle.min.js</code> include <a
                        href="https://popper.js.org/">Popper</a> for our tooltips and popovers. For more information
                    about what&rsquo;s included in Bootstrap, please see our <a
                        href="/docs/5.1/getting-started/contents/#precompiled-bootstrap">contents</a> section.</p>
                <div class="highlight">
                    <pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="p">&lt;</span><span class="nt">script</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js&#34;</span> <span class="na">integrity</span><span class="o">=</span><span class="s">&#34;sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj&#34;</span> <span class="na">crossorigin</span><span class="o">=</span><span class="s">&#34;anonymous&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">script</span><span class="p">&gt;</span>
</code></pre>
                </div>
                <h4 id="separate">Separate</h4>
                <p>If you decide to go with the separate scripts solution, Popper must come first (if you&rsquo;re using
                    tooltips or popovers), and then our JavaScript plugins.</p>
                <div class="highlight">
                    <pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="p">&lt;</span><span class="nt">script</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js&#34;</span> <span class="na">integrity</span><span class="o">=</span><span class="s">&#34;sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp&#34;</span> <span class="na">crossorigin</span><span class="o">=</span><span class="s">&#34;anonymous&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">script</span><span class="p">&gt;</span>
<span class="p">&lt;</span><span class="nt">script</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js&#34;</span> <span class="na">integrity</span><span class="o">=</span><span class="s">&#34;sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/&#34;</span> <span class="na">crossorigin</span><span class="o">=</span><span class="s">&#34;anonymous&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">script</span><span class="p">&gt;</span>
</code></pre>
                </div>
                <h4 id="modules">Modules</h4>
                <p>If you use <code>&lt;script type=&quot;module&quot;&gt;</code>, please refer to our <a
                        href="/docs/5.1/getting-started/javascript/#using-bootstrap-as-a-module">using Bootstrap as a
                        module</a> section.</p>
                <h4 id="components">Components</h4>
                <p>Curious which components explicitly require our JavaScript and Popper? Click the show components link
                    below. If you&rsquo;re at all unsure about the general page structure, keep reading for an example
                    page template.</p>
                <details>
                    <summary class="text-primary mb-3">Show components requiring JavaScript</summary>
                    <ul>
                        <li>Alerts for dismissing</li>
                        <li>Buttons for toggling states and checkbox/radio functionality</li>
                        <li>Carousel for all slide behaviors, controls, and indicators</li>
                        <li>Collapse for toggling visibility of content</li>
                        <li>Dropdowns for displaying and positioning (also requires <a
                                href="https://popper.js.org/">Popper</a>)</li>
                        <li>Modals for displaying, positioning, and scroll behavior</li>
                        <li>Navbar for extending our Collapse plugin to implement responsive behavior</li>
                        <li>Toasts for displaying and dismissing</li>
                        <li>Tooltips and popovers for displaying and positioning (also requires <a
                                href="https://popper.js.org/">Popper</a>)</li>
                        <li>Scrollspy for scroll behavior and navigation updates</li>
                    </ul>

                </details>
                <h2 id="starter-template">Starter template</h2>
                <p>Be sure to have your pages set up with the latest design and development standards. That means using
                    an HTML5 doctype and including a viewport meta tag for proper responsive behaviors. Put it all
                    together and your pages should look like this:</p>
                <div class="highlight">
                    <pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="cp">&lt;!doctype html&gt;</span>
<span class="p">&lt;</span><span class="nt">html</span> <span class="na">lang</span><span class="o">=</span><span class="s">&#34;en&#34;</span><span class="p">&gt;</span>
<span class="p">&lt;</span><span class="nt">head</span><span class="p">&gt;</span>
  <span class="c">&lt;!-- Required meta tags --&gt;</span>
  <span class="p">&lt;</span><span class="nt">meta</span> <span class="na">charset</span><span class="o">=</span><span class="s">&#34;utf-8&#34;</span><span class="p">&gt;</span>
  <span class="p">&lt;</span><span class="nt">meta</span> <span class="na">name</span><span class="o">=</span><span class="s">&#34;viewport&#34;</span> <span class="na">content</span><span class="o">=</span><span class="s">&#34;width=device-width, initial-scale=1&#34;</span><span class="p">&gt;</span>

  <span class="c">&lt;!-- Bootstrap CSS --&gt;</span>
  <span class="p">&lt;</span><span class="nt">link</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css&#34;</span> <span class="na">rel</span><span class="o">=</span><span class="s">&#34;stylesheet&#34;</span> <span class="na">integrity</span><span class="o">=</span><span class="s">&#34;sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We&#34;</span> <span class="na">crossorigin</span><span class="o">=</span><span class="s">&#34;anonymous&#34;</span><span class="p">&gt;</span>

  <span class="p">&lt;</span><span class="nt">title</span><span class="p">&gt;</span>Hello, world!<span class="p">&lt;/</span><span class="nt">title</span><span class="p">&gt;</span>
<span class="p">&lt;/</span><span class="nt">head</span><span class="p">&gt;</span>
<span class="p">&lt;</span><span class="nt">body</span><span class="p">&gt;</span>
  <span class="p">&lt;</span><span class="nt">h1</span><span class="p">&gt;</span>Hello, world!<span class="p">&lt;/</span><span class="nt">h1</span><span class="p">&gt;</span>

  <span class="c">&lt;!-- Optional JavaScript; choose one of the two! --&gt;</span>

  <span class="c">&lt;!-- Option 1: Bootstrap Bundle with Popper --&gt;</span>
  <span class="p">&lt;</span><span class="nt">script</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js&#34;</span> <span class="na">integrity</span><span class="o">=</span><span class="s">&#34;sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj&#34;</span> <span class="na">crossorigin</span><span class="o">=</span><span class="s">&#34;anonymous&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">script</span><span class="p">&gt;</span>

  <span class="c">&lt;!-- Option 2: Separate Popper and Bootstrap JS --&gt;</span>
  <span class="c">&lt;!--
</span><span class="c">    &lt;script src=&#34;https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js&#34; integrity=&#34;sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp&#34; crossorigin=&#34;anonymous&#34;&gt;&lt;/script&gt;
</span><span class="c">    &lt;script src=&#34;https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js&#34; integrity=&#34;sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/&#34; crossorigin=&#34;anonymous&#34;&gt;&lt;/script&gt;
</span><span class="c">    --&gt;</span>
<span class="p">&lt;/</span><span class="nt">body</span><span class="p">&gt;</span>
<span class="p">&lt;/</span><span class="nt">html</span><span class="p">&gt;</span>
</code></pre>
                </div>
                <p>For next steps, visit the <a href="/docs/5.1/layout/grid/">Layout docs</a> or <a
                        href="/docs/5.1/examples/">our official examples</a> to start laying out your site&rsquo;s
                    content and components.</p>
                <h2 id="important-globals">Important globals</h2>
                <p>Bootstrap employs a handful of important global styles and settings that you&rsquo;ll need to be
                    aware of when using it, all of which are almost exclusively geared towards the
                    <em>normalization</em> of cross browser styles. Let&rsquo;s dive in.</p>
                <h3 id="html5-doctype">HTML5 doctype</h3>
                <p>Bootstrap requires the use of the HTML5 doctype. Without it, you&rsquo;ll see some funky incomplete
                    styling, but including it shouldn&rsquo;t cause any considerable hiccups.</p>
                <div class="highlight">
                    <pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="cp">&lt;!doctype html&gt;</span>
<span class="p">&lt;</span><span class="nt">html</span> <span class="na">lang</span><span class="o">=</span><span class="s">&#34;en&#34;</span><span class="p">&gt;</span>
...
<span class="p">&lt;/</span><span class="nt">html</span><span class="p">&gt;</span>
</code></pre>
                </div>
                <h3 id="responsive-meta-tag">Responsive meta tag</h3>
                <p>Bootstrap is developed <em>mobile first</em>, a strategy in which we optimize code for mobile devices
                    first and then scale up components as necessary using CSS media queries. To ensure proper rendering
                    and touch zooming for all devices, <strong>add the responsive viewport meta tag</strong> to your
                    <code>&lt;head&gt;</code>.</p>
                <div class="highlight">
                    <pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="p">&lt;</span><span class="nt">meta</span> <span class="na">name</span><span class="o">=</span><span class="s">&#34;viewport&#34;</span> <span class="na">content</span><span class="o">=</span><span class="s">&#34;width=device-width, initial-scale=1&#34;</span><span class="p">&gt;</span>
</code></pre>
                </div>
                <p>You can see an example of this in action in the <a href="#starter-template">starter template</a>.</p>
                <h3 id="box-sizing">Box-sizing</h3>
                <p>For more straightforward sizing in CSS, we switch the global <code>box-sizing</code> value from
                    <code>content-box</code> to <code>border-box</code>. This ensures <code>padding</code> does not
                    affect the final computed width of an element, but it can cause problems with some third-party
                    software like Google Maps and Google Custom Search Engine.</p>
                <p>On the rare occasion you need to override it, use something like the following:</p>
                <div class="highlight">
                    <pre tabindex="0" class="chroma"><code class="language-css" data-lang="css"><span class="p">.</span><span class="nc">selector-for-some-widget</span> <span class="p">{</span>
<span class="k">box-sizing</span><span class="p">:</span> <span class="kc">content-box</span><span class="p">;</span>
<span class="p">}</span>
</code></pre>
                </div>
                <p>With the above snippet, nested elements—including generated content via <code>::before</code> and
                    <code>::after</code>—will all inherit the specified <code>box-sizing</code> for that
                    <code>.selector-for-some-widget</code>.</p>
                <p>Learn more about <a href="https://css-tricks.com/box-sizing/">box model and sizing at CSS Tricks</a>.
                </p>
                <h3 id="reboot">Reboot</h3>
                <p>For improved cross-browser rendering, we use <a href="/docs/5.1/content/reboot/">Reboot</a> to
                    correct inconsistencies across browsers and devices while providing slightly more opinionated resets
                    to common HTML elements.</p>
                <h2 id="community">Community</h2>
                <p>Stay up to date on the development of Bootstrap and reach out to the community with these helpful
                    resources.</p>
                <ul>
                    <li>Read and subscribe to <a href="https://blog.getbootstrap.com/">The Official Bootstrap Blog</a>.
                    </li>
                    <li>Join <a href="https://bootstrap-slack.herokuapp.com/">the official Slack room</a>.</li>
                    <li>Chat with fellow Bootstrappers in IRC. On the <code>irc.libera.chat</code> server, in the
                        <code>#bootstrap</code> channel.</li>
                    <li>Implementation help may be found at Stack Overflow (tagged <a
                            href="https://stackoverflow.com/questions/tagged/bootstrap-5"><code>bootstrap-5</code></a>).
                    </li>
                    <li>Developers should use the keyword <code>bootstrap</code> on packages that modify or add to the
                        functionality of Bootstrap when distributing through <a
                            href="https://www.npmjs.com/search?q=keywords:bootstrap">npm</a> or similar delivery
                        mechanisms for maximum discoverability.</li>
                </ul>
                <p>You can also follow <a href="https://twitter.com/getbootstrap">@getbootstrap on Twitter</a> for the
                    latest gossip and awesome music videos.</p>

            </div>
        </main>
    </div>


    <footer class="bd-footer py-5 mt-5 bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/"
                        aria-label="Bootstrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="d-block me-2"
                            viewBox="0 0 118 94" role="img">
                            <title>Bootstrap</title>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                                fill="currentColor" />
                        </svg>
                        <span class="fs-5">Bootstrap</span>
                    </a>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2">Designed and built with all the love in the world by the <a
                                href="/docs/5.1/about/team/">Bootstrap team</a> with the help of <a
                                href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>.</li>
                        <li class="mb-2">Code licensed <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE"
                                target="_blank" rel="license noopener">MIT</a>, docs <a
                                href="https://creativecommons.org/licenses/by/3.0/" target="_blank"
                                rel="license noopener">CC BY 3.0</a>.</li>
                        <li class="mb-2">Currently v5.1.0.</li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Home</a></li>
                        <li class="mb-2"><a href="/docs/5.1/">Docs</a></li>
                        <li class="mb-2"><a href="/docs/5.1/examples/">Examples</a></li>
                        <li class="mb-2"><a href="https://themes.getbootstrap.com/">Themes</a></li>
                        <li class="mb-2"><a href="https://blog.getbootstrap.com/">Blog</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5>Guides</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/docs/5.1/getting-started/">Getting started</a></li>
                        <li class="mb-2"><a href="/docs/5.1/examples/starter-template/">Starter template</a></li>
                        <li class="mb-2"><a href="/docs/5.1/getting-started/webpack/">Webpack</a></li>
                        <li class="mb-2"><a href="/docs/5.1/getting-started/parcel/">Parcel</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5>Projects</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap">Bootstrap 5</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/tree/v4-dev">Bootstrap 4</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/icons">Icons</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/rfs">RFS</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap-npm-starter">npm starter</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5>Community</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/issues">Issues</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/discussions">Discussions</a></li>
                        <li class="mb-2"><a href="https://github.com/sponsors/twbs">Corporate sponsors</a></li>
                        <li class="mb-2"><a href="https://opencollective.com/bootstrap">Open Collective</a></li>
                        <li class="mb-2"><a href="https://bootstrap-slack.herokuapp.com/">Slack</a></li>
                        <li class="mb-2"><a href="https://stackoverflow.com/questions/tagged/bootstrap-5">Stack
                                Overflow</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
@endsection
