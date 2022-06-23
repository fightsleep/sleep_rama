<script>

// function debounce(func, wait, immediate) {
// 	var timeout;
// 	return function() {
// 		var context = this, args = arguments;
// 		var later = function() {
// 			timeout = null;
// 			if (!immediate) func.apply(context, args);
// 		};
// 		var callNow = immediate && !timeout;
// 		clearTimeout(timeout);
// 		timeout = setTimeout(later, wait);
// 		if (callNow) func.apply(context, args);
// 	};
// };
    $(document).ready(function() {
        $('#products').DataTable({
            "autoWidth": false,   //ปิด auto width คอลัมน์
            "bPaginate": false,
            "aaSorting": [
                [0, 'desc']
            ],
            "oLanguage": {
                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfo": "แสดง _START_ ถึง _END_ ของจำนวน _TOTAL_ รายการ",
                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                "sSearch": "ค้นหา :",
                "aaSorting": [
                    [0, 'desc']
                ],
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
            },
        });
    });
    let products = $('#products tbody')
    let orders = $('#orders tbody')
    let arrOrders = []
    let paramHnOrder = new URL(location.href).searchParams.get("hn_order")

    function addSerialNo (id, _this) {  
        let index = arrOrders.findIndex( x => x.cpap_id == id )
        arrOrders[index]['serial_no'] = _this.value
    }
    $(function() {
        
        function getProducts() {
            $.ajax({
                type: "GET",
                url: "../../../service/patients/order_script/list_cpap.php"
            }).done(function(data) {
                data.response.forEach(function (item, index){
                    products.append(
                    `<tr>
                    ++index,
                        <td>${index}</td>
                        <td> ${item.cpap_code} </td>
                        <td> ${item.cpap_name}${item.cpap_model}${item.cpap_detail_model} </td>
                        <td> ${item.cpap_type} </td>
                        <td> ${item.cpap_selling_price} </td>  
                        <td> ${item.cpap_company} </td>
                        <td> ${item.p_amount} </td>
                        <td> <button type="button" class="btn btn-outline-success" id="add${item.cpap_id}">
                                เลือกสินค้า
                            </button>
                        </td>
                    </tr>`
                    )
                    $(`#add${item.cpap_id}`).on("click", function(){  //เมื่อคลิกปุ่ม เลือกสินค้า ให้ฟังก์ชั่น addOrder ทำงาน
                        addOrder(item)
                    })
                })
            }).fail(function() {
                products.append(`<tr><td colspan="5" class="text-center">ข้อมูลว่าง</td></tr>`)
            })
        }
        function addOrder(item) {
          //item['p_amount'] = 2
          //item['p_total'] = item['price']
          arrOrders.push(item)
          $('#modalAdd').modal('hide')
          renderOrder()
        } 
        function renderOrder() {
            orders.empty();
            arrOrders.forEach(function (item, index){
                orders.append(`<tr>
                    <td> <p class=""> ${item.cpap_code}</p> </td>
                    <td> <p class=""> ${item.cpap_company}</p> </td>
                    <td> <p class=""> ${item.cpap_name}${item.cpap_model}</p> </td>
                    <td> <p class=""> ${item.cpap_detail_model}</p> </td>
                    <td> <p class=""> ${item.cpap_type}</p> </td>
                    <td> <input type="text" class="form-control form-control-sm" onkeyup="addSerialNo(${item.cpap_id}, this)" 
                    value="${item.serial_no ? item.serial_no : ''}" placeholder="กรอกรหัส"> </td>
                    <td> <p class=""> number_format${item.cpap_selling_price}</p> </td>
                    <td> <p class=""><input type="text" class="form-control form-control-sm" id="p_amount" value="${item.p_amount}"> </td>
                    <td> 
                        <button type="button" class="btn btn-danger form-control form-control-sm" id="delete${index}">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>`)
                $(`#delete${index}`).on("click", function(){
                    deleteOrder(index)
                })
            })
        }
      function deleteOrder(index) {
          arrOrders.splice(index, 1);
          renderOrder()
      }
        $(document).on('submit', '#form_add_order' , function (event) {
            event.preventDefault()
            var dataset =  { name: $("input#name").val(), 
                             email: $("input#email").val(),
                             date_buy: $("input#date_buy").val(), 
                            };
            $.ajax({
                url: "../../../service/patients/order_script/order_script_insert_edit.php",
                method: 'POST',
                dataType: "json",
                data:  
                {
                    arrOrders ,
                    'hn_order': paramHnOrder ,
                    dataset ,
                },
                success: function(data) {
					Swal.fire({
						text: 'เพิ่มข้อมูล Order  เรียบร้อย' + data.hn_order,
						icon: 'success',
						confirmButtonText: 'ตกลง',
					})
            //   window.location="print_order.php?hn_order="+data.hn_order;  //หลังจากบันทึกแล้ว ให้ไปหน้า PDF อัตโนมัติ
				}
                    });
        })
        getProducts()
    })
</script>
