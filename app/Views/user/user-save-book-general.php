<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<form class="form-check m-2" role="search">
    <input class="form-control" type="search" placeholder="Search Book" aria-label="Search" style="padding: 10px; width: 100%" />
    <!-- Menyesuaikan lebar input -->
</form>
<div class="text-center" style="margin-bottom: 20px">
    <!-- Mengatur jarak dari atas -->
    <a href="/saved_book">
        <button type="button" class="btn btn-primary btn-lg custom-btn-general">
            General
        </button>
    </a>
    <a href="/saved_final">
        <button type="button" class="btn btn-secondary btn-lg custom-btn-final-task">
            Final Task
        </button>
    </a>
</div>

<div class="listbook">
    <!-- Bagian konten dengan daftar buku -->
    <div class="row">
        <div class="box">
            <img src="/img/beranitidakdisukai.png" alt="Berani Tidak Disukai" />
            <p>Berani Tidak Disukai</p>
        </div>
        <div class="box">
            <img src="/img/goodvibesgoodlife.png" alt="Good Vibes, Good Life" />
            <p>Good Vibes, Good Life</p>
        </div>
        <div class="box">
            <img src="/img/theprincipleofpower.png" alt="The Principle of Power" />
            <p>The Principle of Power</p>
        </div>
        <div class="box">
            <img src="/img/alphagirls.png" alt="Alpha Girl's" />
            <p>Alpha Girl's</p>
        </div>
        <div class="box">
            <img src="/img/thinkagain.png" alt="Think Again" />
            <p>Think Again</p>
        </div>
    </div>
</div>

<div class="listbook">
    <!-- Bagian konten dengan daftar buku -->
    <div class="row">
        <div class="box">
            <img src="/img/beranitidakdisukai.png" alt="Berani Tidak Disukai" />
            <p>Berani Tidak Disukai</p>
        </div>
        <div class="box">
            <img src="/img/goodvibesgoodlife.png" alt="Good Vibes, Good Life" />
            <p>Good Vibes, Good Life</p>
        </div>
        <div class="box">
            <img src="/img/theprincipleofpower.png" alt="The Principle of Power" />
            <p>The Principle of Power</p>
        </div>
        <div class="box">
            <img src="/img/alphagirls.png" alt="Alpha Girl's" />
            <p>Alpha Girl's</p>
        </div>
        <div class="box">
            <img src="/img/thinkagain.png" alt="Think Again" />
            <p>Think Again</p>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>