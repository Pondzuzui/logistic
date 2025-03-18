<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashboardPO</title>
    <style>
  /* --- Global Style --- */
  body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f0f2f5, #dfe9f3);
            margin: 0;
            padding: 0;
        }

        /* --- Header Style --- */
        .header {
            background: linear-gradient(to right, #0e50ad, #3a6073);
            margin: 40px 5%;
            padding: 20px 5%;
            color: #fff;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header h4 {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
        }

        /* --- Button Container --- */
        .buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .buttons span {
            color: white;
            font-weight: bold;
        }

        .buttons a, .buttons button {
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .buttons a {
            background-color: #27ae60;
            color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .buttons a:hover {
            background-color: #31e47c; /* Deep Blue */
            color: white;
            transform: scale(1.05);
        }

        .buttons button {
            background-color: #e74c3c;
            color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .buttons button:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        /* --- Table Styling --- */
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

        tr:hover {
            background-color: #e1e5ea;
            transition: 0.2s;
        }

        /* --- Link Style --- */
        td a {
            color: #27ae60;
            font-weight: bold;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        /* Filter & Search Section */
        .filter-container {
            background: #ffffff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0px 5%;
        }

        .filter-form label {
            font-weight: bold;
            color: #2c3e50;
        }

        .filter-form input {
            padding: 8px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .filter-form button {
            padding: 8px 12px;
            border: none;
            background: #27ae60;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .filter-form button:hover {
            background: #2980b9;
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

        .search-box button {
            padding: 10px 15px;
            background: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .search-box button:hover {
            background: #27ae60;
            transform: scale(1.05);
        }

        /* สไตล์พื้นหลังมืด */
        .popup-overlay {
            display: none; /* ซ่อน Popup ไว้ก่อน */
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

        /* สไตล์กล่อง Popup */
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
            max-height: 500px; /* เพิ่มความสูงสูงสุด */
            overflow-y: auto; /* แสดงแท็บเลื่อน */
        }

        /* ปุ่มปิด */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .filter-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .filter-form, .search-box {
                width: 100%;
            }

            .search-box input {
                width: 100%;
            }
        }
        .editButton {
        background: linear-gradient(to right, #feb47b); /* ไล่สีแบบสองโทน */
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s ease-in-out;
        }

        .editButton:hover {
        transform: scale(1.05); /* ขยายขนาดเล็กน้อย */
        }

        .editButton:active {
        transform: scale(0.95); /* ย่อขนาดลงตอนกด */
        }

        </style>
</head>
<body>
    <div class="header">
        <h4>📑 ระบบPO</h4>
        <div class="buttons">
            <span>👤 ผู้ใช้: {{ session('emp_name', 'Guest') }}</span>
    
            <a href="{{ route('po.insertpo') }}" class="btn btn-warning">➕ เปิดบิลPO</a>
            
            @csrf
            <a href="{{ route('home') }}" button  type="submit" class="btn btn-danger">🚪 หน้าหลัก</a>
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

    // ✅ ใช้ po_detail_id แทน poDetailId
    fetch(`/get-pobill-detail/${po_detail_id}`)
        .then(response => response.json())
        .then(data => {
            console.log("API Response:", data); // ✅ Debug API response

            if (Array.isArray(data) && data.length > 0) {
                secondPopupBody.innerHTML = ""; // เคลียร์ข้อมูลเก่า
                
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