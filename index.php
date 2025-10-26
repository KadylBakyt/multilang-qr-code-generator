<?php
    declare(strict_types=1);

    require 'vendor/autoload.php';

    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Writer\SvgWriter;

    include 'translations.php';

    $currentLang = $_GET['lang'] ?? $_POST['lang'] ?? 'kk';
    if (!array_key_exists($currentLang, $languages)) {
        $currentLang = 'kk';
    }

    $texts = $languages[$currentLang];

    $qrCodeSvg = '';
    $inputText = '';

    if ($_POST['text'] ?? false) {
        $inputText = htmlspecialchars($_POST['text']);
        $qrCode = new QrCode($inputText);
        $writer = new SvgWriter();
        $result = $writer->write($qrCode);
        $qrCodeSvg = $result->getString();
    }
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $texts['title']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="language-selector">
        <a href="?lang=kk" class="lang-btn <?php echo $currentLang === 'kk' ? 'active' : ''; ?>">ҚАЗ</a>
        <a href="?lang=en" class="lang-btn <?php echo $currentLang === 'en' ? 'active' : ''; ?>">ENG</a>
        <a href="?lang=zh" class="lang-btn <?php echo $currentLang === 'zh' ? 'active' : ''; ?>">中文</a>
        <a href="?lang=ru" class="lang-btn <?php echo $currentLang === 'ru' ? 'active' : ''; ?>">РУС</a>
    </div>

    <div class="container">
        <h1 class="title"><?php echo $texts['title']; ?></h1>
        <p class="subtitle"><?php echo $texts['subtitle']; ?></p>
        
        <form id="qrForm" method="POST">
            <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
            <div class="form-group">
                <label for="text"><?php echo $texts['input_label']; ?></label>
                <textarea 
                    id="text" 
                    name="text" 
                    class="input-field" 
                    rows="4" 
                    placeholder="<?php echo $texts['input_placeholder']; ?>"
                    required
                ><?php echo $inputText; ?></textarea>
            </div>
            
            <div class="button-group">
                <button type="submit" class="btn">
                    <?php echo $texts['generate_btn']; ?>
                </button>
                <button type="button" class="btn btn-clear" id="clearBtn">
                    <?php echo $texts['clear_btn']; ?>
                </button>
            </div>
        </form>
        
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p><?php echo $texts['loading']; ?></p>
        </div>
        
        <?php if ($qrCodeSvg): ?>
        <div class="qr-result" id="qrResult" style="display: block;">
            <h3><?php echo $texts['result_title']; ?></h3>
            <div class="qr-code">
                <?php echo $qrCodeSvg; ?>
            </div>
            <a href="data:image/svg+xml;base64,<?php echo base64_encode($qrCodeSvg); ?>" 
               download="qr-code.svg" 
               class="download-btn">
                <?php echo $texts['download_btn']; ?>
            </a>
        </div>
        <?php endif; ?>
    </div>

    <script src="scripts.js" text="text/javascript"></script>
</body>
</html>
