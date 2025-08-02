<html>
<style>
#footer {
	font-family: Verdana;
	text-align: center;
	color: #DAA03DFF; /* warna font */
	background: #616247FF; /* warna latar */
	padding: 5px;
}
</style>
<body>
<div id="footer">
	<h4>Hakcipta Terpelihara @ Sate King (2025)</h4>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const increase = document.getElementById('size-increase');
    const decrease = document.getElementById('size-decrease');
    const resizeElements = document.querySelectorAll('.resizable-text');

    increase.addEventListener('click', function() {
        resizeElements.forEach(element => {
            let currentSize = parseFloat(window.getComputedStyle(element, null).getPropertyValue('font-size'));
            let newSize = currentSize * 1.1; // Increase by 10%
			if (newSize > 63) newSize = 63; // Maximum size 63px
            element.style.fontSize = (newSize / parseFloat(getComputedStyle(document.documentElement).fontSize)) + 'rem';
        });
    });

    decrease.addEventListener('click', function() {
        resizeElements.forEach(element => {
            let currentSize = parseFloat(window.getComputedStyle(element, null).getPropertyValue('font-size'));
            let newSize = currentSize * 0.9; // Decrease by 10%
            if (newSize < 18) newSize = 18; // Minimum size 20px
            element.style.fontSize = (newSize / parseFloat(getComputedStyle(document.documentElement).fontSize)) + 'rem';
        });
    });
});
</script>
</body>
</html>