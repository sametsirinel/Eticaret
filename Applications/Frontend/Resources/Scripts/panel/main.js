$(function(){
	
	var secilenler = new Array();
	var sitelink = "http://localhost:82/";
	var paneldosyasi = "panel/";
	
	$("#allchecked").click(function(){
		
		var checked = $(this).is(":checked");
		
		$(".DataGridChecked").prop({checked: checked});
		
		secilenEdit();
	});
	
	secilenEdit = function(){
		
		for(x=0;x<$("input[name=DataGridName]").length;x++){
		
			if($("input[name=DataGridName]:checked").eq(x).is(":checked")){
				secilenler[x] = $("input[name=DataGridName]:checked").eq(x).val();
			}else{
				secilenler.splice(x,1);
			}
			
		}
		
		$("#TopluIslemHidden").val(secilenler);
		
	}
	
	$("input[name=DataGridName]").click(function(){
		
		secilenEdit();
		
	});
	
	$(".sSil").click(function(){
		
		$("#TobluIslemType").val("sSil");
		$("#TopluIslemForm").submit();
		
	});
	
	$(".tSil").click(function(){
		
		$("#TobluIslemType").val("tSil");
		$("#TopluIslemForm").submit();
		
	});
	
	$(".oDegis").click(function(){
		
		$("#TobluIslemType").val("oDegis");
		$("#TopluIslemForm").submit();
		
	});
	
	$(".dosyadetay").click(function(){
		
		var dataid = $(this).attr("data-id");
		
		$.ajax({
			
			type:"POST",
			url: sitelink + paneldosyasi + "pdosyalar/dosyadetay/"+dataid,
			data:"",
			dataType:"json",
			success:function(cevap){
				
				if(cevap.type=="img"){
					
					$(".buyukresim").attr("src",cevap.url);
					$("resimalan").show();
					
				}else{
					
					$("resimalan").hide();
					
				}
				$("#copytext").html(cevap.url)				
				
			}
			
		});
		
	});
	
});