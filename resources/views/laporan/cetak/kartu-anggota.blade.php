<page backtop="30mm" backleft="4mm" backright="4mm" backbottom="0mm">
<style>
        *{
        margin: 0;
        padding: 0;
    }
</style>

<page_header>
    <table style="text-align: center; margin: auto;">
        <tr>
            <td colspan="2">
                <h4>Kartu Anggota Perpustakaan</h4>
            </td>
        </tr>
        <tr>
            <td>
                <img src="assets/images/logo/sman-1-kelumpang-hulu.png" style="width: 40px">
            </td>
            <td>
                <h5 style="font-size: 12px; margin-bottom: 5px;">PERPUSTAKAAN SMAN 1 KELUMPANG HULU</h5>
                <p>Jl. Poros Kalseltim Km. 310 <br>Kec. Kelumpang Hulu Kab. Kotabaru</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="height: 2px;background: rgb(51, 50, 50)">
            </td>
        </tr>
    </table>
</page_header>
<table>
    <tbody>
        <tr>
            <td>Id Anggota</td>
            <td> : {{ str_pad($user->id, 2, '0', STR_PAD_LEFT) }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td> : {{ $user->nama }}</td>
            <td rowspan="5">
                <div class="namaSingkat" style="margin-left: 45px">
                    <img src="assets/images/profil/{{ $user->nama_gambar }}" style="width: 70px">
                </div>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td> : {{ $user->email }}</td>
        </tr>
        <tr>
            <td>Telpon</td>
            <td> : {{ $user->telpon }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td> : {{ $user->alamat }}</td>
        </tr>
    </tbody>
</table>
</page>