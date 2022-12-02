<nav class="navbar">
    <button type="button" class="btn btn-light btn-sm btn-block active"><a class="navbar-brand"
            href="{{ route('analisa.index',['periode' => date('Y')]) }}">Absensi</a></button>
</nav>
<nav class="navbar navbar-light">
    <button type="button" class="btn btn-light btn-sm btn-block"><a class="navbar-brand"
            href="{{ route('analisa.kehadiran',['periode' => date('Y')]) }}">Waktu Kehadiran</a></button>
</nav>
<nav class="navbar navbar-light">
    <button type="button" class="btn btn-light btn-sm btn-block"><a class="navbar-brand"
            href="{{ route('analisa.kerjasama',['periode' => date('Y')]) }}">Kerjasama</a></button>
</nav>
<nav class="navbar navbar-light">
    <button type="button" class="btn btn-light btn-sm btn-block"><a class="navbar-brand"
            href="{{ route('analisa.sikapkerja',['periode' => date('Y')]) }}">Sikap Kerja</a></button>
</nav>
<nav class="navbar navbar-light">
    <button type="button" class="btn btn-light btn-sm btn-block"><a class="navbar-brand"
            href="{{ route('analisa.improve',['periode' => date('Y')]) }}">Skill Improve</a></button>
</nav>
<nav class="navbar navbar-light">
    <button type="button" class="btn btn-light btn-sm btn-block"><a class="navbar-brand"
            href="{{ route('hasil_akhir',['periode' => date('Y')]) }}">Hasil Akhir</a></button>
</nav>
