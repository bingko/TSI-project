
<body>
<script type='text/javascript' src='<? echo base_url();?>/application/views/vdo/jwplayer.js'></script>

<br><br><br><br>
 
<center>
 
<div id='mediaspace'>This text will be replaced</div>
<script type='text/javascript'>
  jwplayer('mediaspace').setup({
    'file': '<? echo $list_vdo ; ?>',
    'flashplayer': '<? echo base_url();?>/application/views/vdo/player.swf',
    'streamer': 'rtmp://61.19.251.27/oflaDemo',
    'controlbar': 'bottom',
    'width': '848',
    'height': '360'
  });
</script>
<br />
<br>
<h1>   วีดีโอนี้เป็นลิขสิทธิ์ของ คณะวิทยาการจัดการ มหาวิทยาลัยขอนแก่น <br>
ห้ามนำเผยแพร่ก่อนได้รับอนุญาต  <br>

</h1>
</body>
</html>
