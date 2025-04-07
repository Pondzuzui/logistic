<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📑 ระบบPO</title>
    <style>
/* รีเซ็ตสไตล์พื้นฐาน */
{

box-sizing: border-box;
margin: 0;
padding: 0; 
}

/* สไตล์สำหรับ body */
body {
font-family: 'Arial', sans-serif;
background-color:rgb(255, 255, 255);
color: #343a40;
line-height: 1.6;
padding: 20px;
}

/* ส่วนหัวของหน้า */
.header {
background-color: rgb(30, 62, 122);
color: #ffffff;
padding: 15px;
border-radius: 5px;
margin-bottom: 20px;
display: flex;
justify-content: space-between;
align-items: center;
}

.header h2 {
margin: 0;
}

.header .buttons {
display: flex;
align-items: center;
}

.header .buttons span {
margin-right: 15px;
}

.header .buttons a {
background-color: #3bd315;
color: #ffffff;
padding: 8px 15px;
text-decoration: none;
border-radius: 5px;
margin-right: 10px; /* เพิ่มระยะห่าง */
}

.header .buttons a:hover {
background-color: #15b800;
}

/* คอนเทนเนอร์สำหรับฟิลเตอร์และการค้นหา */
.filter-container {
display: flex;
flex-wrap: wrap;
justify-content: space-between;
margin-bottom: 20px;
width: 100%;
margin-left: auto;
margin-right: auto;
}

.filter-form {
display: flex;
align-items: center;
margin-bottom: 10px;
}

.filter-form label {
margin-right: 10px;
}

.filter-form input[type="date"] {
padding: 8px;
margin-right: 10px;
border: 1px solid #ced4da;
border-radius: 5px;
}

.filter-form button {
padding: 8px 15px;
background-color: #007bff;
color: #ffffff;
border: none;
border-radius: 5px;
cursor: pointer;
}

.filter-form button:hover {
background-color: #0056b3;
}

.search-box {
display: flex;
align-items: center;
margin-bottom: 10px;
}

.search-box input {
padding: 8px;
width: 200px;
border: 1px solid #ced4da;
border-radius: 5px;
}

/* คอนเทนเนอร์สำหรับตาราง */
.table-container {
overflow-x: auto;
}

table {
width: 100%;
margin-left: auto;
margin-right: auto;
border-collapse: collapse;
background-color: #ffffff;
border-radius: 5px;
overflow: hidden;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


table th, table td {
padding: 12px;
text-align: center; /* จัดข้อความให้อยู่ตรงกลางแนวนอน */
vertical-align: middle; /* จัดข้อความให้อยู่ตรงกลางแนวตั้ง */
border: 1px solid #dee2e6; /* เพิ่มเส้นขอบให้กับเซลล์ */
font-size: 14px; /* ปรับขนาดตัวอักษรที่นี่ */
}


table th {
background-color: rgb(30, 62, 122);
color: #ffffff;
}

table tbody tr:nth-child(even) {
background-color: #f2f2f2;
}

table tbody tr:hover {
background-color: #e9ecef;
}

table a {
color: #007bff;
text-decoration: none;
}

table a:hover {
text-decoration: underline;
}

/* สไตล์สำหรับป็อปอัป */
.popup-overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.5);
display: none;
justify-content: center;
align-items: center;
z-index: 1000;
}

.popup-content {
background-color: #ffffff;
padding: 20px;
border-radius: 5px;
width: 100%;
max-width: 1000px;
position: relative;
box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

.close-btn {
position: absolute;
top: 0;
right: 15px;
font-size: 20px;
cursor: pointer;
color: #343a40;
}

.close-btn:hover {
color: #000000;
}

.popup-content table {
width: 100%;
margin-bottom: 20px;
}

textarea {
width: 100%;
padding: 10px;
border: 1px solid #ced4da;
border-radius: 5px;
resize: none;
}

/* การปรับสไตล์สำหรับหน้าจอขนาดเล็ก */
@media (max-width: 768px) {
.filter-container {
    flex-direction: column;
}

.filter-form, .search-box {
    width: 100%;
}

.search-box input {
    width: 100%;
}
}


        </style>
</head>
<body>
    <div class="header">
        <h2>📑 ระบบPO</h2>
        <div class="buttons">
            <span>👤 ผู้ใช้: {{ session('emp_name', 'Guest') }}</span>
    
            <a href="{{ route('po.insertpo') }}" class="btn btn-warning">➕ เปิดบิลPO</a> 
            @csrf
            <a href="{{ route('home') }}" button  type="submit" class="btn btn-danger"style="background-color:red;">🚪 หน้าหลัก</a>
        </div>
    </div>
    
    <!-- Filter & Search Section -->
    <div class="filter-container">
        <form method="GET" action="{{ route('po.dashboardpo') }}" class="filter-form">
            <label for="date">📅 วันที่:</label>
            <input type="date" id="date" name="date" value="{{ request('date') }}">
            <button type="submit">ค้นหา</button>
        </form>
    
        <div class="search-box">
            <input type="text" id="search-input" placeholder=" ค้นหา เลขที่บิล" onkeyup="searchTable()">
        </div>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>บิลลำดับที่</th>
                    <th>เลขอ้างอิงใบรับสินค้า</th>
                    <th>ชื่อร้านค้า</th>
                    <th>ที่อยู่ร้านค้า</th>
                    <th>วันที่รับสินค้า</th>
                    <th>ผู้เปิดบิล</th>
                    <th>ประเภทขนส่ง</th>
                    <th>สถานะการจัดส่ง</th>
                    <th>ข้อมูลสินค้า</th>
                </tr>
            </thead>
                </div>     

                <tbody id="table-body">
                    @foreach($pobill as $item)
                    <tr>
                        <td>{{ $item->po_detail_id}}</td> 
                        <td>{{ $item->po_id}}</td>
                        <td>{{ $item->store_name}}</td>
                        <td>{{ $item->store_address}}</td>  
                        <td>{{ \Carbon\Carbon::parse($item->recvDate)->format('d/m/Y') }}</td> 
                        <td>{{ $item->emp_name }}</td> 
                        <td>
                            @if($item->cartype == 1)
                                มอเตอร์ไซค์
                            @elseif($item->cartype == 2)
                                รถใหญ่
                            @else
                                ไม่ทราบประเภท
                            @endif
                        </td>
                        
                        <td>
                            @if($item->status == 0)
                                กำลังดำเนินการ
                            @else
                                สำเร็จ
                            @endif
                        </td>
                        <td><a href="javascript:void(0);" 
                            onclick="openPopup(
                                '{{ $item->po_detail_id }}',
                                '{{ $item->store_name}}',
                                '{{ $item->store_address}}',
                                '{{ \Carbon\Carbon::parse($item->recvDate)->format('d/m/Y') }}',
                                '{{ $item->emp_name}}',
                                '{{ $item->cartype}}'
                            )">
                        เพิ่มเติม
                     </a></td>
                    </tr>
                    </tr>
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
                                <th>เลขบิลPO</th>
                                <th>ชื่อร้านค้า</th>
                                <th>ที่อยู่ร้านค้า</th>
                                <th>วันที่รับสินค้า</th>
                                <th>ผู้เปิดบิล</th>
                                <th>ประเภทขนส่ง</th>
                            </tr> 
                        </thead>
                        <tbody id="popup-body-1">   
                        </tbody>
                    </table>
                    <br>
                    <table>
                        <thead>     
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                <th>ราคา/หน่วย</th>
                            </tr>
                        </thead>
                        <tbody id="popup-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <script>
function openPopup(po_detail_id, store_name, store_address, recvDate, emp_name, cartype) {
    document.getElementById("popup").style.display = "flex"; // แสดง Popup

    // แปลงค่า cartype
    let cartypeText = "";
    switch (cartype) {
        case "1":
            cartypeText = "มอเตอร์ไซค์";
            break;
        case "2":
            cartypeText = "รถใหญ่";
            break;
        default:
            cartypeText = "ไม่ระบุประเภท";
    }

    let popupBody = document.getElementById("popup-body-1");
    popupBody.innerHTML = `
        <tr>
            <td>${po_detail_id}</td>
            <td>${store_name}</td>
            <td>${store_address}</td>
            <td>${recvDate}</td>
            <td>${emp_name}</td>
            <td>${cartypeText}</td>
        </tr>
    `;



    let secondPopupBody = document.getElementById("popup-body");
    secondPopupBody.innerHTML = "<tr><td colspan='4'>Loading...</td></tr>";

    fetch(`/get-pobill-detail/${po_detail_id}`)
        .then(response => response.json())
        .then(data => {
            console.log("API Response:", data); 

            if (Array.isArray(data) && data.length > 0) {
                secondPopupBody.innerHTML = ""; 
                
                data.forEach(item => {
                    secondPopupBody.insertAdjacentHTML("beforeend", `
                        <tr>
                            <td>${item.item_id}</td>
                            <td>${item.item_name}</td>
                            <td>${item.quantity}</td>
                            <td>${item.unit_price}</td>
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
        


{{--searchTable --}}
    <script>
            function searchTable() {
                let searchInput = document.getElementById("search-input").value.toLowerCase();
                let table = document.querySelector("table tbody");
                let rows = table.getElementsByTagName("tr");
            
                for (let i = 0; i < rows.length; i++) {
                    let row = rows[i];
                    let cells = row.getElementsByTagName("td");
                    let soDetailId = cells[0].textContent.toLowerCase(); 
            
                    if (soDetailId.indexOf(searchInput) > -1) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            }
             window.onload = function() {
    // Sort  the rows by 'so_detail_id' in descending order on page load
              sortTableDescByColumn(0); // Assuming 'so_detail_id' is in the first column (index 0)
        };

        function sortTableDescByColumn(columnIndex) {
            let table = document.querySelector("table tbody");
            let rows = Array.from(table.querySelectorAll("tr"));

            rows.sort(function(rowA, rowB) {
                let cellA = rowA.cells[columnIndex].textContent.trim();
                let cellB = rowB.cells[columnIndex].textContent.trim();

                // Compare numerically or lexicographically, depending on the column type
                if (columnIndex === 0) { // For 'so_detail_id', assuming it's numeric
                    return parseInt(cellB) - parseInt(cellA); // Sort in descending order
                } else {
                    return cellB.localeCompare(cellA); // Sort lexicographically for text columns
                }
            });

            // Reorder the rows in the table
            rows.forEach(row => table.appendChild(row));
        }

    </script>


    </body>
    </html>