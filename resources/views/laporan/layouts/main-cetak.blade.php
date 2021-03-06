<page backtop="15mm" backleft="20mm" backright="20mm" backbottom="40mm">
    <style>
        *{
        margin: 0;
        padding: 0;
    }
    .table-item {
        margin: auto;
        margin-top: 10px;
        border-collapse: collapse;
    }
    .table-item th, .table-item td{
        text-align: left;
            padding: 5px;
            text-align: center;
    }
    </style>
        <nobreak>
            <page_header>
                    <table style="text-align: center; margin: auto;">
                        <tr>
                            <td>
                                <img src="assets/images/logo/sman-1-kelumpang-hulu.png" style="width: 40px">
                                {{-- <img src="{{ asset('assets/images/logo/logo-disperpus-40.png') }}"> --}}
                            </td>
                            <td>
                                <h5 style="font-size: 14px; margin-bottom: 5px;">PERPUSTAKAAN SMAN 1 KELUMPANG HULU</h5>
                                <p>Jl. Poros Kalseltim Km. 310 Kec. Kelumpang Hulu Kab. Kotabaru</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr style="height: 2px;background: rgb(51, 50, 50)">
                            </td>
                        </tr>
                    </table>
            </page_header>
        </nobreak>
        <page_footer>
            <table align="right" style="text-align: center; padding-right: 25px; margin-bottom: 50px">
                <tr>
                    <td>
                        <p style="text-align: center">Kelumpang Hulu, {{ date('m F Y') }}</p>
                        <p style="margin-top: 60px"><u>Pimpinan</u> <br> 1212345517</p>
                    </td>
                </tr>
            </table>
        </page_footer>
    @yield('content')
</page>