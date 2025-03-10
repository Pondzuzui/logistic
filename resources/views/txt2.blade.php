

<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ex7i8gpx2CqIgN6D6MtCQoNU2qBJMv0amRWw6mOg">

    <title>ใบสั่งขาย - 3E</title>

    <!-- Scripts -->
    <script src="http://server_update:8000/js/app.js" defer=""></script>


    <!-- Styles -->
    <style>
        #navHeaderMenu {
            list-style: none inside;
            margin: 0;
            padding: 0;
            text-align: center;
            z-index: 999999;
            position: relative;
        }

        #navHeaderMenu li {
            display: block;
            position: relative;
            float: left;
            background: #fff;
            /* menu background color */
        }

        #navHeaderMenu li a {
            display: block;
            padding: 0;
            text-decoration: none;
            width: 200px;
            /* this is the width of the menu items */
            line-height: 35px;
            /* this is the hieght of the menu items */
            color: #000;
            /* list item font color */
        }

        #navHeaderMenu li li a {
            font-size: 100%;
        }

        /* smaller font size for sub menu items */
        #navHeaderMenu li:hover {
            background: #c7cac9;
        }

        #navHeaderMenu li: {
            background: #003f20;
        }

        /* highlights current hovered list item and the parent list items when hovering over sub menues */
        #navHeaderMenu ul {
            position: absolute;
            padding: 0;
            left: 0;
            display: none;
            /* hides sublists */
        }

        #navHeaderMenu li:hover ul ul {
            display: none;
        }

        /* hides sub-sublists */
        #navHeaderMenu li:hover ul {
            display: block;
        }

        /* shows sublist on hover */
        #navHeaderMenu li li:hover ul {
            display: block;
            /* shows sub-sublist on hover */
            margin-left: 200px;
            /* this should be the same width as the parent list item */
            margin-top: -35px;
            /* aligns top of sub menu with top of list item */
        }
    </style>
        <style>
        .labelText {
            text-align: right;
            color: blue;
            border-width: 0px;
            border-style: solid;
            border-color: black;
        }

        .content_showso {
            margin: 5px 5px;
        }

        .content_tb_sreachso {
            color: rgb(24, 24, 179);
        }

        .btn_button {
            background-color: rgb(216, 235, 242);
            border: 0;
        }

        .btn_button:hover {
            background-color: rgb(127, 215, 242);
            border: 0;
            border-radius: 5px;
        }

        .btn_button1 {
            background-color: rgb(213, 213, 213);
            border: 0;
        }

        .btn_button1:hover {
            background-color: rgb(167, 167, 167);
            border: 0;
        }

        .size_card {
            width: 200px;
        }

        .table th,
        .table td {
            padding: 5px !important;
        }

        .td_PO {
            width: 90px !important;
        }
    </style>
    <style>
        .tooltipDate {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltipDate .tooltiptextDate {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            font-size: 10px;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
        }

        .tooltipDate:hover .tooltiptextDate {
            visibility: visible;
        }

        .previous {
            background-color: #f1f1f1;
            color: black;
        }

        .round {
            border-radius: 50%;
        }

    </style>
    <link href="http://server_update:8000/css/app.css" rel="stylesheet">
    <script>
    async function getPONetAmnt(PONum) {
        const response = await fetch("http://server_update:8000/api/getPOHDNetAmnt?PONum=" + PONum)
        if (response.ok) {
            let PONums = await response.json()
            PONums.forEach((PONum)=>{
                document.getElementById('td'+PONum.DocuNo).innerHTML = "<div style='text-align:center'>" + parseFloat(PONum.NetAmnt).toFixed(2) + "</div>";
            })

        }
    }
</script>
</head>

<body>
    <div id="app"><nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"><a href="javascript:history.back()"><img src="http://server_update:8000/images/left-arrow.png" style="width: 30px; height: 30px;"></a> <div class="container"><a href="http://server_update:8000" class="navbar-brand"><img src="http://server_update:8000/images/LOGO_3E.jpg" style="width: 50px; height: 50px;"></a> <ul id="navHeaderMenu"><li><a href="javascript:void(0)"><button type="button" class="btn btn-secondary dropdown-toggle" style="width: 100%; background: rgb(233, 105, 75);">MENU</button></a> <ul><li><a href="http://server_update:8000/solist">SO</a></li><li><a href="/disbursement">เบิกจ่าย</a></li><li><a href="/bill_requirement">ใบ Requirement</a></li></ul></li></ul> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button> <div id="navbarSupportedContent" class="collapse navbar-collapse"><ul class="navbar-nav mr-auto"></ul> <ul class="navbar-nav ml-auto"><li class="nav-item"><a href="http://server_update:8000/login" class="nav-link">Login</a></li> <li class="nav-item"><a href="http://server_update:8000/register" class="nav-link">Register</a></li></ul></div></div></nav></div>
    <div class="container-fluid">
        <main class="py-3">
                    <div class="container">
                        <div class="d-flex">
            <div class="class=" p-2"="">
                                                                </div>
            <div class="ml-auto p-2">
                <div class="d-flex align-items-center">
                    <div class="col">
                                                                                    <button style="margin:2px" disabled="" class="badge badge-success">complete</button>
                                                                        </div>
                    <div class="col">
                        <p>เครื่องปริ้น</p>
                    </div>
                    <div class="col"><select id="selectPrinterDevice" onchange="setPrinter(this)" name=""><option value="0"></option><option value="\\ว้าล\TSC TTP-247">ของนอก</option><option value="TSC TTP-247 internal">ภานใน</option><option value="TSC TTP-247 store">สโตว์</option></select></div>
                    <div class="col"><button style="margin:2px" class="btn btn-info" onclick="printSO('68/004921')">print</button></div>
                </div>
            </div>
        </div>
        <form action="http://server_update:8000/completeSOPO" method="POST" id="completeSOPO">
            <input type="hidden" name="_token" value="ex7i8gpx2CqIgN6D6MtCQoNU2qBJMv0amRWw6mOg">            <input id="SONum_Complete" name="SONum" type="hidden" value="68/004921">
        </form>
        <form action="http://server_update:8000/saveSOPO" method="POST" id="saveSOPO">
            <input type="hidden" name="_token" value="ex7i8gpx2CqIgN6D6MtCQoNU2qBJMv0amRWw6mOg">            <input id="ResponseBy" name="ResponseBy" type="hidden" value="">
            <input id="SONum" name="SONum" type="hidden" value="">
            <input id="Remark" name="Remark" type="hidden" value="">
            <input id="deletePolist" name="deletePolist" type="hidden" value="">
            <input id="newPolist" name="newPolist" type="hidden" value="">
            <input id="lastUpdate" name="lastUpdate" type="hidden" value="2025-03-10 15:18:38">
        </form>
        <!--------------------------------- กรอบค้นหา So ---------------------------------------->
        <div style="border: 2px solid rgb(150, 149, 149);padding: 10px; border-radius: 25px;">
            <table>
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <table>
                                <tbody><tr>
                                    <td>
                                        <div class="labelText">SO</div>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="SOCode" id="SOCode" style="width: 100%;color:black;background-color:white;" value="68/004921" readonly="">
                                    </td>
                                    <td>
                                        <div class="labelText">สถานะใบสั่งขาย</div>
                                    </td>
                                    <td><input class="form-control" type="text" name="" id="" readonly="" style="width: 110px;" value="PARTIAL"></td>
                                    <td>
                                        <div class="labelText">ผู้รับผิดชอบ : <b>sukanay charinram</b>
                                        </div>
                                    </td>
                                    <td>

                                        <select class="form-control" id="SOResponseBy" name="SOResponseBy"><option value="0"></option><option value="106">am3e</option><option value="33">Aor</option><option value="13">ARTEE3E</option><option value="35">Atitaya</option><option value="27">benjaporn poontawee</option><option value="34">Benz</option><option value="14">BOBOMAN</option><option value="121">bot_1</option><option value="122">bot_2</option><option value="37">chanuporn pawamateesakul</option><option value="98">Chirun</option><option value="117">Ckakkrawal  Kaewsuya</option><option value="90">Fanta</option><option value="30">FILM</option><option value="111">Hoshi 3E_battery</option><option value="42">Jiab</option><option value="95">Jittraporn(JU)</option><option value="113">JOYINDY</option><option value="68">kaew</option><option value="105">kanitin2</option><option value="53">kanyavee ผึ้ง</option><option value="31">kung</option><option value="76">maneerat(Innovation)</option><option value="47">MUK</option><option value="28">ning</option><option value="38">NOEY</option><option value="2">Nuttavat Boonrod</option><option value="115">PAILIN LANONGKAN</option><option value="89">Pamika (May EITA)</option><option value="10">Patipan</option><option value="102">Phakpapha</option><option value="12">Pirun Klangprapun</option><option value="101">prang</option><option value="75">pumpui</option><option value="43">rungpairin</option><option value="11">Sirinapa N.</option><option value="91">Sittasri(TENT EITA)</option><option value="16">sukanay charinram</option><option value="40">Suprinya Yothong</option><option value="8">sysadmin</option><option value="108">tae</option><option value="94">tanaporn</option><option value="97">tanaporn นาย</option><option value="119">tip3e</option><option value="46">toomtam-sale</option><option value="21">yam3E</option><option value="24">Ying_EEE</option><option value="56">Yok</option><option value="72">กชกรณ์ ใยรัก หมี</option><option value="114">กวาง</option><option value="62">กวาง &lt;กุลธวัช&gt;</option><option value="71">กิ๊บ</option><option value="93">กุลธวัช (บัญชี)</option><option value="3">ขม</option><option value="57">ขิม</option><option value="69">คณิติน</option><option value="51">คุณฉัตร</option><option value="104">จิธาณ์ฒฐ์ ธีรโซติวัฒรกุล(บอย)</option><option value="15">จุฑามาศ</option><option value="29">ชัญญานุช ศรีสำราญ (นุช)</option><option value="85">ญาณวรุตม์  รามพัด (นน)</option><option value="20">ณัฎฐ์ชญาภา ทวีพิศาลชัย</option><option value="50">ตวงรัตน์ อ่อนเบา</option><option value="67">ตาลนอก</option><option value="107">ทิพ</option><option value="41">น้อย บัญชี</option><option value="100">นัชชา บรรจงกะเสนา ณ อยุธยา</option><option value="87">นัท</option><option value="118">นันทกานต์ ภัทรเจริญพงษ์</option><option value="26">นิธิ ดาราฉาย</option><option value="61">นุ้ย &lt;เอก&gt;</option><option value="18">ปรรวี นาประจักษ์</option><option value="52">ปอ</option><option value="84">ปาลิตา อังศุภศิริกุล (ปุ๊ก)</option><option value="55">ผักบุ้ง</option><option value="92">ผึ้ง กุลธวัช</option><option value="66">ฝ้าย</option><option value="103">พลอย ปณิ</option><option value="39">มล</option><option value="9">มินตรา</option><option value="88">รัศมี สุปัญโญ</option><option value="74">ลูกกอล์ฟ</option><option value="44">ลูกน้ำ แก้วใส</option><option value="70">ลูกหมี</option><option value="58">ศศิธร  อ้นฟอง</option><option value="120">ศิริ</option><option value="32">สตางค์เอตะ(เฮียท๊อป)</option><option value="79">สุธนัย</option><option value="19">สุภาภรณ์ อินทร์แก้ว</option><option value="17">สุวิจักขณ์</option><option value="48">หทัยชนก สันธนาคร</option><option value="73">หทัยทิพย์</option><option value="65">หมิง</option><option value="64">หมู</option><option value="86">หมูหวาน</option><option value="59">อ้อม</option><option value="25">อัช</option><option value="83">เจนจิรา (เอย)</option><option value="109">เชร์</option><option value="110">เตย (Eita)</option><option value="116">เบล</option><option value="36">เมย์ (กุลธวัช)</option><option value="77">เหมยเคนดี้</option><option value="54">เอ๊กซ์(กุลธวัช)</option><option value="22">เอกลักษณ์ นิยมจันทร์</option><option value="49">แตงโม</option><option value="1">แอม</option></select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="labelText">PO อ้างอิง</div>
                                    </td>
                                    <td>
                                        <input class="form-control" style="" type="text" name="" id="" readonly="" value="PO-25001441">
                                    </td>
                                    <td colspan="4">
                                        <table>
                                            <tbody><tr>
                                                <td>
                                                    <div class="labelText">รหัสลูกค้า</div>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="" id="" readonly="" value="CUS-06226" style="width: 100px;margin-right: 2px;">
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="" id="" disabled="" style="width: 280px" value="อีสเทิร์น  โพลีแพค  จำกัด">
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="labelText">วันส่งของ </div>
                                    </td>
                                    <td><input class="form-control" type="text" value="2025-03-12" style="width: 120px;margin-top: 2px;" readonly=""></td>
                                    <td>
                                        <div class="labelText">วิธีการส่ง</div>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" value="" style="width: 110px;" readonly="">
                                    </td>
                                    <td class="labelText">Sale:sukanay charinram</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="labelText">หมายเหตุ </div>
                                    </td>
                                    <td colspan="4">
                                        <textarea class="form-control" id="SORemark" style="margin-top: 3px; text-align:left" rows="3"></textarea>
                                    </td>
                                    <td><button onclick="saveRemarkOnly()" class="btn btn-info">บันทึก(หมายเหตุ)</button>
                                    </td>
                                    <td><a href="insertdata"><button class="btn btn-info" >เปิดบิล</button></a> 
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!------------------------------ table ใบแจ้งหนี้ ------------------------------------------>
        <br>
        <div style="border: 5px solid rgb(150, 149, 149);padding: 10px;">
            <div class="row" style="padding: 0px 10px;">
                            </div>
        </div>
        <br>
        <!-------------------------- ตาราง ข้อมูล po ----------------------------->
        <div class="row">
            <div class="col">
                <div class="content_showso">
                    <table id="POList" class="table table-bordered">
                        <thead style="background: #337ab7;color: aliceblue;">
                            <tr><th style="width:100px;text-align:center">PO</th>
                            <th style="width:120px;text-align:center">vendor</th>
                            <th style="text-align:center">ชื่อ</th>
                            <th style="width:120px;text-align:center">วันส่งของ</th>
                            <th style="width:120px;text-align:center">วิธีรับของ</th>
                            <th style="text-align:center">Detail</th>
                                                        <th style="width:100px;text-align:center">ราคา</th>
                        </tr></thead>
                        <tbody>
                                                                                            <tr>
                                    <td style="background-color:inherit;width: 90px;"><a href="javascript:window.open('http://server-3e/3e/polist.php?method=search&amp;rowPerPage=5&amp;currentPage=0&amp;PONum=6803-01107','PO','width=1300,height=600')">6803-01107</a>
                                    </td>
                                    <td style="">VEN-00023.1</td>
                                    <td>ธีรชัยไพศาล คอร์ปอเรชั่น จำกัด</td>
                                    <td>2025-03-14</td>
                                    <td>ร้านค้าจัดส่งให้</td>
                                    <td><button type="button" class="btn_button1" onclick="window.open('http://server_update:8000/popupWindows/PODetailMyAccount?PONum=6803-01107','welcome','width=1000,height=500,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes')">Details</button>
                                    </td>

                                                                        <td id="tdPO6803-01107"><div style="text-align:center">436.93</div></td>
                                </tr>
                                
                                                        <script>getPONetAmnt('PO6803-01107')</script>
                        </tbody>
                    </table>
                                    </div>
            </div>
        </div>
        <br>
        <!-------------------------- ตาราง ข้อมูล po ภายใน ----------------------------->
        <div class="row">
            <div class="col">
                <div class="content_showso">
                    <table id="" class="table table-bordered">
                        <thead style="background: #337ab7;color: aliceblue;">
                            <tr><th style="width: 120px;">PO ภายใน</th>
                            <th style="width: 50px;">Seq</th>
                            <th style="width: 450px;">คำบรรยายสินค้า</th>
                            <th style="width: 100px;">จำนวน</th>
                            <th style="width: 120px;">ราคาต่อหน่วย</th>
                            <th>ทั้งหมด</th>
                            <th>สถานะการซื้อ</th>
                        </tr></thead>
                        <tbody>
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main></div>
        
    

    <script src="js/cleave.js"></script>
    <script>
        async function saveRemarkOnly() {
            let Remark = document.getElementById('SORemark').value
            let SONum = "68/004921"
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let response = await fetch("http://server_update:8000/api/saveRemarkSOPO", {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'POST',
                body: JSON.stringify({
                    "SONum": SONum,
                    "Remark": Remark
                })
            })
            if (response.ok) {
                let data = await response.json()
                alert(data.message)
            }
        }

        async function printSO(SONum) {
            let PrinterName = document.getElementById("selectPrinterDevice").value
            if (PrinterName == 0) {
                alert('กรุณาเลือกปริ้นเตอร์')
                return
            }
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let response = await fetch("http://server_update:8000/api/printSO", {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'POST',
                body: JSON.stringify({
                    "SONum": "68/004921",
                    "PrinterName": PrinterName
                })
            })
            if (response.ok) {
                let data = await response.json()
                alert(data.message)
            }

        }
        async function setPrinter(element) {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let response = await fetch("http://server_update:8000/api/setSession?key=printerSticker&value=", {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'POST',
                body: JSON.stringify({
                    "key": "printerSticker",
                    "value": element.value
                })
            })
            if (response.ok) {
                alert("บันทึกเครื่องปริ้นสำเร็จ")
            }

        }
            </script>


</body></html>