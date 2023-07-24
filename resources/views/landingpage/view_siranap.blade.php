<p>last update {{ $last_up }}</p>
<div class="row">
    @foreach ($data as $d)
        <div class="col-md-2 col-sm-6 col-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon" style="background-color:rgb(194, 162, 236)"><i class="bi bi-align-end text-light"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-bold">{{$d->RUANG }} |
                    @if($d->KODE_UNIT == 2)VIP
                    @elseif ($d->KODE_UNIT == 3)Kelas I
                    @elseif ($d->KODE_UNIT == 4)Kelas II
                    @elseif ($d->KODE_UNIT == 5)Kelas II
                    @elseif ($d->KODE_UNIT == 6)ICU
                    @elseif ($d->KODE_UNIT == 10)NICU
                    @elseif ($d->KODE_UNIT == 11)PICU
                    @endif
                    </span>
                    <span class="">Kapasitas : {{ $d->JUMLAH }}</span>
                    <span class="@if($d->JUMLAH - $d->TERPAKAI == 0) bg-danger @endif">Tersedia : {{ $d->JUMLAH - $d->TERPAKAI }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
