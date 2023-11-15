<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>NISN</th>
        <th>Status</th>
        <th>No Peserta</th>
        {{-- <th>No. KK</th>
        <th>NIK Ayah</th>
        <th>NIK Ibu</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Asal Sekolah</th>
        <th>Alamat Sekolah</th>
        <th>Jumlah Hafalan</th>
        <th>Nama Ayah</th>
        <th>Pekerjaan Ayah</th>
        <th>Penghasilan Ayah</th>
        <th>Pendidikan Terakhir Ayah</th>
        <th>No Whatshap Ayah</th>
        <th>Nama Ibu</th>
        <th>Pekerjaan Ibu</th>
        <th>Penghasilan Ibu</th>
        <th>Pendidikan Terakhir Ibu</th>
        <th>No Whatshap Ibu</th>
        <th>Nama Wali</th>
        <th>Hubungan Wali</th>
        <th>Alamat Wali</th>
        <th>Pekerjaan Wali</th>
        <th>Penghasilan Wali</th>
        <th>Pendidikan Terakhir Wali</th>
        <th>No Whatshap Wali</th> --}}
    </tr>
    </thead>
    <tbody>
    @foreach($agen as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->nisn }}</td>
            <td>{{ $lulus }}</td>
            <td>{{ $item->nomor_peserta }}</td>
            {{-- <td>{{ $item->no_kk }}</td>
            <td>{{ $item->nik_ayah }}</td>
            <td>{{ $item->nik_ibu }}</td>       
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->tempat_lahir }}</td>
            <td>{{ $item->tanggal_lahir }}</td>
            <td>{{ $item->agama }}</td>
            <td>{{ $item->asal_sekolah }}</td>
            <td>{{ $item->alamat_sekolah }}</td>
            <td>{{ $item->jumlah_hafalan }}</td>
            <td>{{ $item->nama_ayah }}</td>
            <td>{{ $item->pekerjaan_ayah }}</td>
            <td>{{ $item->penghasilan_ayah }}</td>
            <td>{{ $item->pendidikan_terakir_ayah }}</td>
            <td>{{ $item->no_wa_ayah }}</td>
            <td>{{ $item->nama_ibu }}</td>
            <td>{{ $item->pekerjaan_ibu }}</td>
            <td>{{ $item->penghasilan_ibu }}</td>
            <td>{{ $item->pendidikan_terakir_ibu }}</td>
            <td>{{ $item->no_wa_ibu }}</td>
            <td>{{ $item->nama_wali_siswa }}</td>
            <td>{{ $item->hubungan_dengan_siswa }}</td>
            <td>{{ $item->alamat_wali_siswa }}</td>
            <td>{{ $item->pekerjaan_wali }}</td>
            <td>{{ $item->penghasilan_wali }}</td>
            <td>{{ $item->pendidikan_terakir_wali }}</td>
            <td>{{ $item->no_wa_wali_siswa }}</td>  
        </tr> --}}
    @endforeach
    </tbody>
</table>