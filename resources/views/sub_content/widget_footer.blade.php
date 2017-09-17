@if(Auth::user()->role_id == ROLE_CALON)
<div class="row no-space">

</div>
@elseif(Auth::user()->role_id == ROLE_PENDAMPING)
<div class="row no-space">
    <div class="col-xs-4">
        <strong class="profile-stat-count">
            {{count($jasa_pendampingan)}}
        </strong>
        <span>
            Jasa
        </span>
    </div>
    <div class="col-xs-4">
        <strong class="profile-stat-count">
            0
        </strong>
        <span>
            UMKM
        </span>
    </div>
    <div class="col-xs-4">
        <strong class="profile-stat-count">
            0
        </strong>
        <span>
            Kegiatan
        </span>
    </div>
</div>

@elseif(Auth::user()->role_id == ROLE_UMKM)
<div class="row no-space">
    <div class="col-xs-4">
        <strong class="profile-stat-count">
            0
        </strong>
        <span>
            Konsultasi
        </span>
    </div>
    <div class="col-xs-4">
        <strong class="profile-stat-count">
            0
        </strong>
        <span>
            Produk
        </span>
    </div>
    <div class="col-xs-4">
        <strong class="profile-stat-count">
            0
        </strong>
        <span>
            Kegiatan
        </span>
    </div>
</div>

@endif