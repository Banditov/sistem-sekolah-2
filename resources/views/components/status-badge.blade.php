@if ($status == 'Aktif')
    <span class="inline-block border border-green-200 bg-green-50 px-2.5 py-1 text-[12px] font-semibold text-green-700">
        Aktif
    </span>
@else
    <span class="inline-block border border-red-200 bg-red-50 px-2.5 py-1 text-[12px] font-semibold text-red-700">
        Tidak Aktif
    </span>
@endif