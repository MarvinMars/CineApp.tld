@extends('app')
@section('content')
    <section class="profile-page">
        <div class="wrapper">
            <div class="page-header">
                <img src="/img/dots.png" class="dots">
                <img src="/img/path4.png" class="path">
                <div class="container align-items-center">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h1 class="profile-title text-left">Mike Scheinder</h1>
                            <h5 class="text-on-back">01</h5>
                            <p class="profile-description">Offices parties lasting outward nothing age few resolve. Impression to discretion understood to we interested he excellence. Him remarkably use projection collecting. Going about eat forty world has round miles.</p>
                            <div class="btn-wrapper profile pt-3">
                                <a target="_blank" href="https://twitter.com/creativetim" class="btn btn-icon btn-twitter btn-round" data-toggle="tooltip" data-original-title="Follow us">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank" href="https://www.facebook.com/creativetim" class="btn btn-icon btn-facebook btn-round" data-toggle="tooltip" data-original-title="Like us">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                                <a target="_blank" href="https://dribbble.com/creativetim" class="btn btn-icon btn-dribbble  btn-round" data-toggle="tooltip" data-original-title="Follow us">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                            <div class="card card-coin card-plain">
                                <div class="card-header">
                                    <img src="/img/mike.jpg" class="img-center img-fluid rounded-circle">
                                    <h4 class="title">Transactions</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#linka">
                                                Wallet
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#linkb">
                                                Send
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#linkc">
                                                News
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tab-subcategories">
                                        <div class="tab-pane active" id="linka">
                                            <div class="table-responsive">
                                                <table class="table tablesorter " id="plain-table">
                                                    <thead class=" text-primary">
                                                    <tr>
                                                        <th class="header">
                                                            COIN
                                                        </th>
                                                        <th class="header">
                                                            AMOUNT
                                                        </th>
                                                        <th class="header">
                                                            VALUE
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            BTC
                                                        </td>
                                                        <td>
                                                            7.342
                                                        </td>
                                                        <td>
                                                            48,870.75 USD
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            ETH
                                                        </td>
                                                        <td>
                                                            30.737
                                                        </td>
                                                        <td>
                                                            64,53.30 USD
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            XRP
                                                        </td>
                                                        <td>
                                                            19.242
                                                        </td>
                                                        <td>
                                                            18,354.96 USD
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="linkb">
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Pay to</label>
                                                <div class="col-sm-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="e.g. 1Nasd92348hU984353hfid">
                                                        <span class="form-text">Please enter a valid address.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Amount</label>
                                                <div class="col-sm-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="1.587">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-simple btn-primary btn-icon btn-round float-right"><i class="tim-icons icon-send"></i></button>
                                        </div>
                                        <div class="tab-pane" id="linkc">
                                            <div class="table-responsive">
                                                <table class="table tablesorter " id="plain-table">
                                                    <thead class=" text-primary">
                                                    <tr>
                                                        <th class="header">
                                                            Latest Crypto News
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            The Daily: Nexo to Pay on Stable...
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Venezuela Begins Public of Nation...
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            PR: BitCanna – Dutch Blockchain...
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <div class="row justify-content-between align-items-center">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="d-block" src="/img/denys.jpg" alt="First slide">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Big City Life, United States</h5>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block" src="/img/fabien-bazanegue.jpg" alt="Second slide">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Somewhere Beyond, United States</h5>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block" src="/img/mark-finn.jpg" alt="Third slide">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Stocks, United States</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <i class="tim-icons icon-minimal-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <i class="tim-icons icon-minimal-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h1 class="profile-title text-left">Projects</h1>
                            <h5 class="text-on-back">02</h5>
                            <p class="profile-description text-left">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>
                            <div class="btn-wrapper pt-3">
                                <button href="javascript:void(0)" class="btn btn-simple btn-primary">
                                    <i class="tim-icons icon-book-bookmark"></i> Bookmark
                                </button>
                                <button href="javascript:void(0)" class="btn btn-simple btn-info">
                                    <i class="tim-icons icon-bulb-63"></i> Check it!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h1 class="profile-title text-left">Contact</h1>
                                    <h5 class="text-on-back">03</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Your Name</label>
                                                    <input type="text" class="form-control" value="Mike">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="email" class="form-control" placeholder="mike@email.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" value="001-12321345">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Company</label>
                                                    <input type="text" class="form-control" value="CreativeTim">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <input type="text" class="form-control" placeholder="Hello there!">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-round float-right" rel="tooltip" data-original-title="Can't wait for your message" data-placement="right">Send text</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="tim-icons icon-square-pin"></i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Find us at the office</h4>
                                    <p> Bld Mihail Kogalniceanu, nr. 8,
                                        <br> 7652 Bucharest,
                                        <br> Romania
                                    </p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="tim-icons icon-mobile"></i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Give us a ring</h4>
                                    <p> Michael Jordan
                                        <br> +40 762 321 762
                                        <br> Mon - Fri, 8:00-22:00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection