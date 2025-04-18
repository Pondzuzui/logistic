<!DOCTYPE html>
<html lang="th">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดเตรียมDoc</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .header {
            background: linear-gradient(to right, #0e50ad, #3a6073);
            padding: 15px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.2rem;
            border-radius: 8px;
            margin: 20px auto;
            width: 90%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .header button {
            background-color: #e74c3c;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .header button:hover {
            background-color: #c0392b;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin: auto;
        }
        .table-container {
            background: white;
            margin: 0 5%;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .top-section button {
            padding: 8px 12px;
            border: none;
            background: #27ae60;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .top-section {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0px 5%;
        }

        .top-section label {
            font-weight: bold;
            color: #2c3e50;
        }

        .top-section input {
            padding: 8px;
            border-radius: 5px;
            font-size: 1rem;
        }
        .top-section button:hover {
            background: #2980b9;
        }
        .filter-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-container input {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .filter-container button {
            background-color: #2ecc71;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .filter-container button:hover {
            background-color: #27ae60;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .button-group button {
            padding: 15px 20px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .button-group button {
            background-color: #f39c12;
            font-size: 16px;
            color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .button-group button:hover {
            background-color: #e67e22;
            transform: scale(1.05);
        }
        .table th, .table td {
            padding: 12px;
            border: 1px solid #dcdde1;
            text-align: center;
        }

        .table th {
            background-color: #e67e22;
            color: white;
            font-weight: bold;
        }

        .table-striped tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-striped tr:hover {
            background-color: #ecf0f1;
        }

        .link {
            color: #16a085;
            font-weight: bold;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            padding: 12px;
            border: 1px solid #2c3e50;
            font-size: 1rem;
        }

        th {
            background-color: #0e50ad;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(odd) {
            background-color: #f8f9fa;
        }

        .tr {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e1e5ea;
            width: 70%;
            transition: 0.2s;
        }

        td a {
            color: #27ae60;
            font-weight: bold;
            text-decoration: none;
        }

        .search-box {
            flex-grow: 1;
            max-width: 200px;
        }

        .search-box input {
            width: 90%;
            height: 30px;
            margin: 0px -30%;
            background: #f8f9fa;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: linear-gradient(to right, #f0f2f5, #dfe9f3);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 1000px;
            height: auto;
            text-align: center;
            position: relative;
            overflow: hidden;
            max-height: 500px;
            overflow-y: auto;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }
        .search-box {
            flex-grow: 1;
            max-width: 200px;
        }

        .search-box input {
            width: 90%;
            height: 30px;
            margin: 0px 10px;
            background: #f8f9fa;
        }

        .search-box {
            display: flex;
            align-items: center;
            transition: 0.3s;
            max-width: 250px;
        }

        .search-box input {
            flex-grow: 1;
            padding: 5px;
            border: none;
            outline: none;
            font-size: 1rem;
            border-radius: 5px;
            background-color: #e1e5ea;
        }

    </style>
</head>
<body>
    <div class="header">
        <h2>ประวัติเส้นทางเอกสารเพิ่มเติม</h2>
        <a href="adminSO" ><button value="back"></button></a>
    </div>

    <div class="container">
        <div class="top-section">
        <form method="GET" action="{{ route('ducument.historydoc') }}" class="filter-form" id="autoSearchForm">
            <label for="date">📅 วันที่:</label>
            <input type="date" id="date" name="date" value="{{ request('date', \Carbon\Carbon::today()->format('Y-m-d')) }}">
            <button type="submit" style="display: none;">ค้นหา</button>
        </form>

    
    <script>
        const form = document.getElementById('autoSearchForm');
        const dateInput = document.getElementById('date');
    
        // ส่งฟอร์มเมื่อเปลี่ยนวันที่
        dateInput.addEventListener('change', () => {
            form.submit();
        });
    
        // ส่งฟอร์มอัตโนมัติเมื่อเข้าหน้าเว็บครั้งแรกเท่านั้น
        window.addEventListener('load', () => {
            if (!sessionStorage.getItem('hasAutoSubmitted')) {
                sessionStorage.setItem('hasAutoSubmitted', 'true');
                form.submit();
            }
        });
    </script>
    

            <div class="button-group">
                <button onclick="createCSV()">ดาวน์โหลด CSV</button>
            </div>
            
            <div class="search-box">
            <input type="text" id="search-input" placeholder=" ค้นหา เลขที่บิล" onkeyup="searchTable()">
        </div>
            </div>
        </div>
        <div class="table-container">
            <table>
                <input type="checkbox" id="checkAll" onclick="toggleCheckboxes()"> ทั้งหมด
                <thead>
                    <tr>
                        <th>ปริ้นเอกสาร</th>
                        <th>เลขที่บิล</th>
                        <th>เลขที่อ้างอิง</th>
                        <th>ชื่อ</th>
                        <th>ที่อยู่</th>
                        <th>ละติจูด ลองจิจูด</th>
                        <th>ประเภทบิล</th>
                        <th>ผู้เปิดบิล</th>
                        <th>วันที่จัดส่ง</th>
                        <th>ข้อมูลรายละเอียด</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach($docbill as $item)
                    @if($item->status == 1)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-control1" name="status[]" data-doc-detail-id="{{ $item->doc_id }}">
                        </td>
                        <td>{{ $item->doc_id }}</td>
                        <td>{{ $item->so_id }}</td>
                        <td>{{ $item->customer_name }}</td>
                        <td>{{ $item->customer_address }}</td>
                        <td>{{ $item->customer_la_long }}</td>
                        <td>{{ $item->doctype }}</td>
                        <td>{{ $item->emp_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->revdate)->format('d/m/Y') }}</td>
                        <td>
                            <a href="javascript:void(0);" onclick="openPopup(
                            '{{ $item->doc_id }}',
                            '{{ $item->customer_name }}',
                            '{{ $item->customer_address }}',
                            '{{ $item->revdate }}',
                            '{{ $item->emp_name }}',
                            '{{ $item->notes }}',
                            )">
                                เพิ่มเติม
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        
            @if(isset($message))
            <br>
            <p style="text-align: center">{{ $message }}</p>
            @endif
        </div>
        
        <!-- Popup -->
        <div class="popup-overlay" id="popup" style="display: none;">
            <div class="popup-content">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>เลขที่บิล</th>
                                <th>ชื่อ</th>
                                <th>ที่อยู่</th>
                                <th>วันที่จัดส่ง</th>
                                <th>ผู้เปิดบิล</th>
                            </tr>
                        </thead>
                        <tbody id="popup-body-1">
                        </tbody>
                    </table>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>แจ้งเพิ่มเติม</th>
                            </tr>
                        </thead>
                        <tbody id="popup-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <script>
        function openPopup(doc_id,customer_name,customer_address,revdate,emp_name) {
            document.getElementById("popup").style.display = "flex"; // แสดง Popup
        
            let popupBody = document.getElementById("popup-body-1");
            popupBody.innerHTML = `
                <tr>
                    <td>${doc_id}</td>
                    <td>${customer_name}</td>
                    <td>${customer_address}</td>
                    <td>${revdate}</td>
                    <td>${emp_name}</td>
                </tr>
            `;
        
            let secondPopupBody = document.getElementById("popup-body");
            secondPopupBody.innerHTML = "<tr><td colspan='4'>Loading...</td></tr>";
        
            // ใช้ fetch ดึงข้อมูลจาก Laravel
            fetch(`/get-docbill-detail/${doc_id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        secondPopupBody.innerHTML = ""; // เคลียร์ข้อมูลเก่า
                        data.forEach(item => {
                            secondPopupBody.insertAdjacentHTML("beforeend", `
                                <tr>
                                    <td>${item.notes}</td>
                                </tr>
                            `);
                        });
        
                    } else {
                        secondPopupBody.innerHTML = "<tr><td colspan='4'>ไม่มีข้อมูล</td></tr>";
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    secondPopupBody.innerHTML = "<tr><td colspan='4'>เกิดข้อผิดพลาด</td></tr>";
                });
        }
        
        function closePopup() {
            document.getElementById("popup").style.display = "none"; // ซ่อน Popup
        }
        
        window.onclick = function(event) {
            let popup = document.getElementById("popup");
            if (event.target === popup) {
                closePopup();
            }
        }
        </script>


<script>


function searchTable() {
    let searchInput = document.getElementById("search-input").value.toLowerCase();
    let table = document.querySelector("table tbody");
    let rows = table.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        let row = rows[i];
        let cells = row.getElementsByTagName("td");

        // Get the content of the second column (บิลลำดับ)
        let soDetailId = cells[1] ? cells[1].textContent.toLowerCase() : '';

        // Search for the text inside the selected column (บิลลำดับ)
        if (soDetailId.indexOf(searchInput) > -1) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

    </script>

<script>
     
     function createCSV() {
    const headers = [
        "เลขที่บิล", "เลขที่อ้างอิง", "ชื่อ", "ที่อยู่",
        "ละติจูดลองจิจูด", "ประเภทบิล", "ผู้เปิดบิล", "วันที่จัด"
    ];

    let data = [];
    let selecteddocDetailIds = []; // เก็บ so_detail_id ของแถวที่เลือก

    let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

    checkboxes.forEach(checkbox => {
        let row = checkbox.closest("tr");
        if (!row) return;

        let cells = row.querySelectorAll("td");
        let rowData = [];

        // ดึงข้อมูลจากแต่ละเซลล์ (ข้าม checkbox column)
        cells.forEach((cell, index) => {
            if (index > 0 && index <= 8) { 
                rowData.push(`"${cell.textContent.trim()}"`);
            }
        });

        // ดึงค่า so_detail_id แล้วเก็บไว้
        let docDetailId = checkbox.getAttribute("data-doc-detail-id");
        if (docDetailId) {
            selecteddocDetailIds.push(docDetailId);
        }

        data.push(rowData.join(","));
    });

    if (data.length === 0) {
        alert("กรุณาเลือกข้อมูลที่ต้องการพิมพ์ CSV");
        return;
    }

    const csvContent = "\uFEFF" + [headers.join(","), ...data].join("\n");

    const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "ประวัติเอกสารเส้นทางเดินรถของเอกสารเพิ่มเติม.csv";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);


    if (selecteddocDetailIds.length > 0) {
        updateStatus(selecteddocDetailIds);
    }
}


function toggleCheckboxes() {
    var checkAllBox = document.getElementById('checkAll');
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#checkAll)');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = checkAllBox.checked;
    });
}

</script>

</body>
</html>