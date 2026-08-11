<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Learning Tracker</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600;700&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    :root{
        --paper:#F6F5F1;
        --ink:#1C1F26;
        --ink-soft:#6B6F76;
        --line:#DEDCD4;
        --accent:#B8860B;
        --accent-bright:#D9A404;
        --done-bg:#EFEEE8;
        --window-bar:#EDEBE4;
    }
    *{box-sizing:border-box;}
    body{
        font-family:'IBM Plex Sans',sans-serif;
        background:var(--paper);
        color:var(--ink);
        margin:0;
        padding:48px 20px;
        min-height:100vh;
    }
    .wrap{max-width:680px;margin:0 auto;}

    .eyebrow{
        font-family:'IBM Plex Mono',monospace;
        font-size:12px;
        letter-spacing:0.12em;
        color:var(--accent);
        text-transform:uppercase;
        margin-bottom:10px;
        font-weight:600;
    }
    h1{
        font-family:'IBM Plex Mono',monospace;
        font-size:28px;
        font-weight:600;
        margin:0 0 6px 0;
        letter-spacing:-0.01em;
    }
    .sub{
        color:var(--ink-soft);
        font-size:14px;
        margin-bottom:28px;
    }

    .progress-line{
        display:flex;
        align-items:center;
        gap:12px;
        margin-bottom:32px;
        font-family:'IBM Plex Mono',monospace;
        font-size:13px;
        color:var(--ink-soft);
    }
    .bar{
        flex:1;
        height:6px;
        background:var(--line);
        border-radius:3px;
        overflow:hidden;
    }
    .bar-fill{
        height:100%;
        background:var(--accent-bright);
        border-radius:3px;
        transition:width 0.3s ease;
    }

    .window{
        border:1px solid var(--line);
        border-radius:10px;
        background:#fff;
        overflow:hidden;
        box-shadow:0 1px 2px rgba(0,0,0,0.04);
        margin-bottom:20px;
    }
    .titlebar{
        background:var(--window-bar);
        padding:10px 14px;
        display:flex;
        align-items:center;
        gap:8px;
        border-bottom:1px solid var(--line);
    }
    .dot{width:10px;height:10px;border-radius:50%;}
    .dot.r{background:#E5847A;}
    .dot.y{background:#E8C468;}
    .dot.g{background:#8FBE8A;}
    .filename{
        font-family:'IBM Plex Mono',monospace;
        font-size:12px;
        color:var(--ink-soft);
        margin-left:8px;
    }

    .content{padding:18px 20px;}

    form.addrow{
        display:flex;
        gap:8px;
        flex-wrap:wrap;
    }
    input[type=text], select{
        font-family:'IBM Plex Mono',monospace;
        font-size:13px;
        padding:10px 12px;
        border:1px solid var(--line);
        border-radius:6px;
        background:var(--paper);
        color:var(--ink);
        outline:none;
    }
    input[type=text]{flex:1;min-width:160px;}
    input[type=text]:focus, select:focus{border-color:var(--accent-bright);}
    input[type=text]::placeholder{color:#A6A39A;}

    button{
        font-family:'IBM Plex Mono',monospace;
        font-size:13px;
        font-weight:600;
        padding:10px 16px;
        background:var(--ink);
        color:#fff;
        border:none;
        border-radius:6px;
        cursor:pointer;
    }
    button:hover{background:var(--accent);}

    .log-window .content{padding:6px 0;}

    .entry{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:12px;
        padding:11px 20px;
        border-bottom:1px solid var(--line);
        font-family:'IBM Plex Mono',monospace;
        font-size:13.5px;
    }
    .entry:last-child{border-bottom:none;}
    .entry:hover{background:var(--paper);}

    .entry-left{display:flex;align-items:center;gap:10px;min-width:0;}
    .checkbox{
        color:var(--ink-soft);
        flex-shrink:0;
        white-space:nowrap;
    }
    .entry.done .checkbox{color:var(--accent);}

    .title{
        color:var(--ink);
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }
    .entry.done .title{color:#A6A39A;text-decoration:line-through;}

    .tag{
        color:var(--accent);
        opacity:0.85;
        flex-shrink:0;
    }

    .entry-actions{display:flex;gap:4px;flex-shrink:0;}
    .entry-actions a{
        text-decoration:none;
        color:var(--ink-soft);
        font-size:12px;
        padding:5px 9px;
        border-radius:5px;
    }
    .entry-actions a:hover{background:var(--done-bg);color:var(--ink);}
    .entry-actions a.del:hover{background:#FBE7E4;color:#C1503F;}

    .empty{
        padding:32px 20px;
        text-align:center;
        color:var(--ink-soft);
        font-family:'IBM Plex Mono',monospace;
        font-size:13px;
    }
</style>
</head>
<body>
<div class="wrap">

    <div class="eyebrow">~/learning-log</div>
    <h1>Learning Tracker</h1>
    <div class="sub">The skills you sharpen during practical training aren't for exams — they're for the career waiting after this</div>

    <?php
        $total = count($topics);
        $doneCount = count(array_filter($topics, fn($t) => $t['is_done']));
        $percent = $total > 0 ? round(($doneCount / $total) * 100) : 0;
    ?>

    <div class="progress-line">
        <span><?= $doneCount ?> / <?= $total ?> done</span>
        <div class="bar"><div class="bar-fill" style="width:<?= $percent ?>%"></div></div>
        <span><?= $percent ?>%</span>
    </div>

    <div class="window">
        <div class="titlebar">
            <span class="dot r"></span><span class="dot y"></span><span class="dot g"></span>
            <span class="filename">new-topic.sh</span>
        </div>
        <div class="content">
            <form class="addrow" action="/topics/add" method="post">
                <input type="text" name="title" placeholder="cth: Docker Compose" required>
                <select name="category" required>
                    <option value="Docker">Docker</option>
                    <option value="PHP">PHP</option>
                    <option value="CodeIgniter">CodeIgniter</option>
                    <option value="Oracle/OCI8">Oracle/OCI8</option>
                    <option value="MySQL">MySQL</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>
                <button type="submit">+ add</button>
            </form>
        </div>
    </div>

    <div class="window log-window">
        <div class="titlebar">
            <span class="dot r"></span><span class="dot y"></span><span class="dot g"></span>
            <span class="filename">progress.log</span>
        </div>
        <div class="content">

            <?php if (empty($topics)): ?>
                <div class="empty">Belum ada topic lagi. Tambah satu di atas! →</div>
            <?php endif; ?>

            <?php foreach ($topics as $topic): ?>
                <div class="entry <?= $topic['is_done'] ? 'done' : '' ?>">
                    <div class="entry-left">
                        <span class="checkbox">[<?= $topic['is_done'] ? 'x' : ' ' ?>]</span>
                        <span class="title"><?= esc($topic['title']) ?></span>
                    </div>
                    <span class="tag">#<?= strtolower(str_replace('/', '', esc($topic['category']))) ?></span>
                    <div class="entry-actions">
                        <a href="/topics/toggle/<?= $topic['id'] ?>"><?= $topic['is_done'] ? 'undo' : 'done' ?></a>
                        <a href="/topics/delete/<?= $topic['id'] ?>" class="del" onclick="return confirm('Padam topic ni?')">rm</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

</div>
</body>
</html>