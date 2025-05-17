<!DOCTYPE html>
<html lang="th">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดเตรียมสินค้า</title>
<style>
      body {
    font-family: 'Poppins', sans-serif;
    background-color: #f5f7fa;
    margin: 0;
    padding: 0;
}

/* Header */
.header {
    background: linear-gradient(to right, #0e50ad, #3a6073);
    padding: 0px 30px;
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

.header-buttons {
    display: flex;
    gap: 10px;
    margin-left: auto;
}

.header-buttons button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    transition: all 0.3s ease;
    margin-right: 10px;
}

.btn-po {
    background-color: #4CAF50;
    color: white;
}

.btn-po:hover {
    background-color: #27ae60;
}

.btn-so {
    background-color: #2196F3;
    color: white;
}

.btn-so:hover {
    background-color: #00389f;
}

.header-buttons button:hover {
    transform: scale(1.05);
}

/* Container */
.container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    margin: auto;
}

/* Top Section */
.top-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    margin: 0px 5%;
    margin-bottom: 15px;
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

.top-section button {
    padding: 8px 12px;
    border: none;
    background: #27ae60;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.top-section button:hover {
    background: #2980b9;
}

/* Filter */
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

/* Button Group */
.button-group {
    display: flex;
    gap: 10px;
}

.button-group button {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: bold;
    font-size: 16px;
    background-color: #f39c12;
    color: white;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
}

.button-group button:hover {
    background-color: #e67e22;
    transform: scale(1.05);
}

/* Table */
.table-container {
    background: #f9f9f9;
    margin: 2% 5%;
    padding: 10px;
    border-radius: 12px;
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 99%;
    max-width: 100%;
    transform: scale(0.9);
    transform-origin: top left;
}

table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
}

th, td {
    padding: 8px;
    border: 1px solid #ddd;
    word-wrap: break-word;
    overflow-wrap: break-word;
    max-width: 150px;
}

th {
    background-color: #0e50ad;
    color: white;
    text-transform: uppercase;
    width: 20ch;
}

td a {
    color: #27ae60;
    font-weight: bold;
    text-decoration: none;
}

.table-striped tr:nth-child(odd),
tr:nth-child(odd),
.tr {
    background-color: #f8f9fa;
}

.table-striped tr:hover,
tr:hover {
    background-color: #e1e5ea;
    transition: 0.2s;
}

/* Link */
.link {
    color: #16a085;
    font-weight: bold;
    text-decoration: none;
}

.link:hover {
    text-decoration: underline;
}

/* Search */
.search-box {
    display: flex;
    max-width: 300px;
    width: 100%;
}

.search-box input {
    height: 30px;
    background: #f8f9fa;
}

/* Popup */
.popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background: linear-gradient(to right, #f0f2f5, #dfe9f3);
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 1000px;
    max-height: 500px;
    overflow-y: auto;
    text-align: center;
    position: relative;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
}

/* Car Type Select */
.cartype {
    margin: 20px 0;
    font-family: Arial, sans-serif;
}

.cartype label {
    font-size: 16px;
    font-weight: bold;
    margin-right: 10px;
    color: #333;
}

.cartype select {
    padding: 8px;
    font-size: 14px;
    width: 200px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    transition: border-color 0.3s;
}

.cartype select:focus {
    border-color: #007BFF;
    outline: none;
}

.cartype option {
    padding: 10px;
}

/* Responsive */
@media (max-width: 768px) {
    table th, table td {
        padding: 12px 8px;
        white-space: nowrap;
    }

    table {
        overflow-x: auto;
    }

    .table-container {
        padding: 10px;
        -webkit-overflow-scrolling: touch;
    }
}

@media (max-width: 480px) {
    th, td {
        font-size: 12px;
    }

    .table-container {
        padding: 5px;
    }
}

</style>
</head>
<body>
    <div class="header">
        <h2>ประวัติจัดเตรียมรถรับของPO</h2>
        <div class="header-buttons">
            <a href="adminSO"><button class="btn-so">หน้าหลัก</button></a>
        </div>
    </div>

        <div class="top-section">
        <form method="GET" action="{{ route('po.historypo') }}" class="filter-form" id="autoSearchForm">
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
    
            <div class="search-box">
                <input type="text" id="search-input" placeholder=" ค้นหา เลขที่บิล" onkeyup="searchTable()">
            </div>

            <div class="cartype">
                <label for="cartype">🚗 ประเภทรถ :</label>
                <select id="cartype" onchange="filterTable()">
                    <option value="">ทั้งหมด</option>
                    <option value="1">รถมอเตอร์ไซค์</option>
                    <option value="2">รถใหญ่</option>
                </select>
            </div>
            <div class="button-group">
                <button type="button" class="btn btn-primary" onclick="updateStatuspoback()">คืนสถานะ</button>
            </div>
            
        
        </div>
  
       <div class="table-container">
    <table>
        <input type="checkbox" id="checkAll" onclick="toggleCheckboxes()"> ทั้งหมด
        <thead>
            <tr>
                <th>ปริ้นเอกสาร</th>
                <th>เลขอ้างอิงใบรับสินค้า</th>
                <th>เลขที่บิล</th>
                <th>ชื่อร้านค้า</th>
                <th>ที่อยู่ร้านค้า</th>
                <th>ละติจูดลองจิจูด</th>
                <th>วันที่รับสินค้า</th>
                <th>ผู้เปิดบิล</th>
                <th>ประเภทขนส่ง</th>
                <th>ข้อมูลสินค้า</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach($pobill as $item)
                @if($item->status == 1)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-control1" name="status[]" data-po-detail-id="{{ $item->po_id}}">
                        </td>
                        <td>{{ $item->po_id }}</td>
                        <td>{{ $item->po_detail_id }}</td>
                        <td>{{ $item->store_name }}</td>
                        <td>{{ $item->store_address }}</td>  
                        <td>{{ $item->store_la_long }}</td>
                     <td>
    <div class="date-container">
        <span class="date-display" id="date-display-{{ $item->po_detail_id }}">
            {{ \Carbon\Carbon::parse($item->recvDate)->format('d/m/Y') }}
        </span>
        <div class="date-edit-form" id="date-edit-form-{{ $item->po_detail_id }}" style="display:none;">
            <input type="date" class="form-control form-control-sm" id="new-date-{{ $item->po_detail_id }}" 
                value="{{ \Carbon\Carbon::parse($item->recvDate)->format('Y-m-d') }}"
                onchange="validateDateFormat(this)">
            <div class="mt-1">
                <button type="button" class="btn btn-sm btn-success" 
                        onclick="saveNewDate('{{ $item->po_detail_id }}')">บันทึก</button>
                <button type="button" class="btn btn-sm btn-secondary" 
                        onclick="cancelEdit('{{ $item->po_detail_id }}')">ยกเลิก</button>
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-primary edit-date-btn" 
                id="edit-btn-{{ $item->po_detail_id }}"
                onclick="showEditForm('{{ $item->po_detail_id }}')">
            <i class="fas fa-edit"></i> แก้ไข
        </button>
    </div>
</td>

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
                        <td><a href="javascript:void(0);" 
                            onclick="openPopup(
                                '{{ $item->po_id }}',
                                '{{ $item->po_detail_id }}',    
                                '{{ $item->store_name}}',
                                '{{ $item->store_address}}',
                                '{{ \Carbon\Carbon::parse($item->recvDate)->format('d/m/Y') }}',
                                '{{ $item->emp_name}}',
                                '{{ $item->cartype}}'
                            )">
                        เพิ่มเติม
                     </a></td>
                @endif
            @endforeach
        </tbody>
    </table>
    @if(isset($message))
    <br>
    <p style="text-align: center">{{ $message }}</p>
    @endif
</div>

  <script>
    function showEditForm(poDetailId) {
        document.getElementById('date-display-' + poDetailId).style.display = 'none';
        document.getElementById('edit-btn-' + poDetailId).style.display = 'none';
        document.getElementById('date-edit-form-' + poDetailId).style.display = 'block';
    }

    function cancelEdit(poDetailId) {
        document.getElementById('date-display-' + poDetailId).style.display = 'inline';
        document.getElementById('edit-btn-' + poDetailId).style.display = 'inline-block';
        document.getElementById('date-edit-form-' + poDetailId).style.display = 'none';
    }

    function validateDateFormat(inputElement) {
        let dateValue = inputElement.value;
        if (!dateValue || dateValue.includes('undefined')) {
            let today = new Date();
            let yyyy = today.getFullYear();
            let mm = String(today.getMonth() + 1).padStart(2, '0');
            let dd = String(today.getDate()).padStart(2, '0');
            inputElement.value = yyyy + '-' + mm + '-' + dd;
        }
    }

    function saveNewDate(poDetailId) {
        let newDate = document.getElementById('new-date-' + poDetailId).value;

        if (!newDate || newDate === 'undefined') {
            alert('กรุณาระบุวันที่ให้ถูกต้อง');
            return;
        }

        console.log({ po_detail_id: poDetailId, new_date: newDate }); // ตรวจสอบข้อมูลก่อนส่ง

        $.ajax({
            url: "{{ route('updatepo.delivery.date') }}", 
            method: "POST",
            data: {
                po_detail_id: poDetailId,
                new_date: newDate,
                _token: "{{ csrf_token() }}"
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response); // ดูข้อมูลที่เซิร์ฟเวอร์ส่งกลับมา
                if (response.success) {
                    let formattedDate = formatDate(newDate);
                    document.getElementById('date-display-' + poDetailId).innerText = formattedDate;
                    alert("วันที่ถูกอัพเดทเรียบร้อยแล้ว");
                    cancelEdit(poDetailId);
                    window.location.reload();
                } else {
                    alert("เกิดข้อผิดพลาด: " + response.message);
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText); // ดูรายละเอียดของข้อผิดพลาดที่เกิดขึ้น
                alert("เกิดข้อผิดพลาด: " + xhr.responseText);
            }
        });
    }

    function formatDate(dateString) {
        if (!dateString || dateString === 'undefined') {
            return '';
        }
        try {
            if (dateString.includes('-') && dateString.split('-').length === 3) {
                let parts = dateString.split('-');
                let day = parts[2].padStart(2, '0');
                let month = parts[1].padStart(2, '0');
                let year = parts[0];
                return day + '/' + month + '/' + year;
            }

            let date = new Date(dateString);
            if (isNaN(date.getTime())) {
                return dateString;
            }

            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0');
            let year = date.getFullYear();
            return day + '/' + month + '/' + year;
        } catch (e) {
            console.error("Error formatting date:", e);
            return dateString;
        }
    }
</script>
<!-- Popup -->
<div class="popup-overlay" id="popup" style="display: none;">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>เลขอ้างอิงใบรับสินค้า</th>
                        <th>เลขที่บิล</th>
                        <th>รหัสลูกค้า</th>
                        <th>ที่อยู่จัดส่ง</th>
                        <th>วันที่จัดส่ง</th>
                        <th>ผุ้ขาย</th>
                        <th>ประเภทรถ</th>
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
                    </tr>
                </thead>
                <tbody id="popup-body">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openPopup(po_id,po_detail_id, store_name, store_address, recvDate, emp_name, cartype) {
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
                <td>${po_id}</td>
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

    // ฟังก์ชันปิด Popup
    function closePopup() {
        document.getElementById("popup").style.display = "none"; // ซ่อน Popup
    }
    function filterTable() {
    let selectedType = document.getElementById("cartype").value; // รับค่าจาก dropdown
    let table = document.getElementById("table-body");
    let rows = table.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        let typeCell = rows[i].getElementsByTagName("td")[8]; // เปลี่ยน index ให้ตรงกับ "ประเภทขนส่ง"
        if (typeCell) {
            let typeText = typeCell.textContent.trim(); // ดึงค่าจาก <td>

            // แปลงค่า text เป็นค่าของ dropdown
            let typeValue = "";
            if (typeText === "มอเตอร์ไซค์") typeValue = "1";
            if (typeText === "รถใหญ่") typeValue = "2";

            // เช็คเงื่อนไขการกรอง
            if (selectedType === "" || typeValue === selectedType) {
                rows[i].style.display = ""; // แสดงแถว
            } else {
                rows[i].style.display = "none"; // ซ่อนแถว
            }
        }
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
                let poDetailId = cells[1] ? cells[1].textContent.toLowerCase() : '';

                // Search for the text inside the selected column (บิลลำดับ)
                if (poDetailId.indexOf(searchInput) > -1) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        function sortTableDescending() {
            let table = document.querySelector("table tbody");
            let rows = Array.from(table.getElementsByTagName("tr"));
            
            // Sort rows by po_detail_id (ที่คอลัมน์ที่ 2) in descending order
            rows.sort((a, b) => {
                let poDetailIdA = a.cells[1].textContent.trim();
                let poDetailIdB = b.cells[1].textContent.trim();
                
                return poDetailIdB - poDetailIdA;  // เปลี่ยนเป็น b - a เพื่อให้เรียงจากมากไปน้อย
            });

            // Append the sorted rows back into the table body
            rows.forEach(row => table.appendChild(row));
        }

        // เรียกใช้ฟังก์ชัน sort เมื่อโหลดหน้า
        window.onload = function() {
            sortTableDescending();
        }
        function toggleCheckboxes() {
    var checkAllBox = document.getElementById('checkAll');
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#checkAll)');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = checkAllBox.checked;
    });
}
</script>
 <script>
    function updateStatuspoback() {
        let selectedIds = [];
        let checkboxes = document.querySelectorAll("input[name='status[]']:checked");

        checkboxes.forEach(checkbox => {
            let row = checkbox.closest('tr');
            let poDetailId = row.querySelector('td:nth-child(3)').textContent; // Get so_detail_id from second column
            selectedIds.push(poDetailId);
        });

        if (selectedIds.length === 0) {
            alert("กรุณาเลือกบิลที่ต้องการอัปเดต");
            return;
        }

        // Proceed to update
        console.log("Updating status for:", selectedIds); // Log the selected IDs

        fetch('/update-statuspoback', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ poDetailIds: selectedIds })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Optionally reload the page to reflect changes
            } else {
                alert("ไม่สามารถอัปเดตสถานะได้");
            }
        })
        .catch(error => {
            console.error("Error updating status:", error);
            alert("เกิดข้อผิดพลาดในการอัปเดตสถานะ");
        });
    }   
    
</script>

</body>
</html>