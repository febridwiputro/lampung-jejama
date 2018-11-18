<header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary" id="top">
        <a class="navbar-brand" href="#" alt="">LampungJejama.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-aauto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('Beranda') ?>">Home <span class="sr-only" >(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Explore </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?php echo base_url('Event') ?>"> Event </a>
                    <a class="dropdown-item" href="<?php echo base_url('Wisata_alam') ?>"> Wisata Alam </a>
                    <a class="dropdown-item" href="<?php echo base_url('Wisata_buatan') ?>"> Wisata Buatan </a>
                    <a class="dropdown-item" href="<?php echo base_url('Wisata_budaya') ?>"> Wisata Budaya </a>
                    <a class="dropdown-item" href="<?php echo base_url('Wisata_kuliner') ?>"> Wisata Kuliner </a>
                    <a class="dropdown-item" href="<?php echo base_url('Travel_hotel') ?>"> Travel &amp; Hotel </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Tentang_kami') ?>"> Tentang Kami </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Kontak') ?>"> Kontak </a>
            </li>
          </ul>
           <!-- search form -->
          <form class="form-inline my-2 my-lg-0">
              <div class="btn-group">
                  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                  <button class="btn btn-success fa fa-search" type="submit"></button>
          </form>
        </div>
      </nav>
    </header>