<div align="center">

# 🚫 DisableItem

<p><em>Full control over every item on your server — disable anything, anytime.</em></p>

<p>
  <img src="https://img.shields.io/github/downloads/PM-haedarXD/DisableItem/total?style=for-the-badge&logo=github&color=blueviolet" alt="Downloads">
  <img src="https://img.shields.io/github/stars/PM-haedarXD/DisableItem?style=for-the-badge&logo=github&color=yellow" alt="Stars">
  <img src="https://img.shields.io/github/license/PM-haedarXD/DisableItem?style=for-the-badge&color=success" alt="License">
</p>

<p>
  <img src="https://img.shields.io/badge/Code-PHP-777bb3?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Game-Minecraft-62b47a?style=for-the-badge&logo=minecraft" alt="Minecraft">
  <img src="https://img.shields.io/badge/API-5.0.0-fb8c00?style=for-the-badge" alt="API">
</p>

</div>

---

## 📖 Overview

> **DisableItem** gives you complete control over any item on your server. Block placement, usage, pickup, commands, and even remove from creative — all configurable.

| Protection | Detail |
|:----------:|--------|
| 🧱 Place | Blocked |
| 🖐️ Use | Blocked |
| 📦 Pickup | Blocked |
| ⌨️ /give | Blocked |
| 🎨 Creative | Removed |

---

## ✨ Features

| Category | Detail |
|---------|--------|
| 🔧 Configurable | Choose any item by name or ID |
| 🧱 Block Place | Prevents placing disabled blocks |
| 🖐️ Block Use | Prevents using disabled items |
| 📦 Block Pickup | Prevents picking up disabled items |
| ⌨️ Command | Blocks /give for disabled items |
| 🎨 Creative | Removes disabled items from creative |
| 💬 Message | Optional warning message |
| ⚡ Lightweight | No lag |

---

## 📥 Installation

| Step | Action |
|:---:|--------|
| 1 | Download from [Releases](https://github.com/PM-haedarXD/DisableItem/releases) |
| 2 | Place `DisableItem.phar` in `plugins/` |
| 3 | Restart server |
| 4 | Edit `config.yml` to add items |

---

## ⚙️ Configuration

```yaml
disabled-items:
  - "TNT"
  - "Lava"
  - "Flint"

block-place: true
block-use: true
block-pickup: true
block-command: true
remove-creative: true
show-message: true
message: "This item is disabled"
```

---

👤 Author

<div align="center">

<img src="https://github.com/PM-haedarXD.png" width="80" style="border-radius: 50%;">

haedarXD

<a href="https://github.com/PM-haedarXD"><img src="https://img.shields.io/badge/GitHub-PM--haedarXD-24292e?style=flat-square&logo=github" alt="GitHub"></a>

</div>

---

📜 License

MIT

</div>
