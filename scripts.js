document.getElementById('qrForm').addEventListener('submit', function(e) {
    const loading = document.getElementById('loading');
    const result = document.getElementById('qrResult');
    
    loading.style.display = 'block';
    if (result) {
        result.style.display = 'none';
    }
});

document.getElementById('clearBtn').addEventListener('click', function() {
    const textArea = document.getElementById('text');
    const result = document.getElementById('qrResult');
    
    textArea.value = '';
    textArea.style.height = 'auto';
    
    if (result) {
        result.style.display = 'none';
    }
    
    textArea.focus();
});

document.getElementById('text').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
});