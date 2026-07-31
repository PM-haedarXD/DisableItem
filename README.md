<div align="center">

# 🚫 DisableItem

### Powerful item restriction plugin for PocketMine-MP & NG-PocketMine-MP

Disable any item on your server with a simple configuration.

<p>
    <img src="https://img.shields.io/github/downloads/PM-haedarXD/DisableItem/total?style=for-the-badge&logo=github&color=blueviolet">
    <img src="https://img.shields.io/github/stars/PM-haedarXD/DisableItem?style=for-the-badge&logo=github&color=yellow">
    <img src="https://img.shields.io/github/license/PM-haedarXD/DisableItem?style=for-the-badge&color=success">
</p>

<p>
    <img src="https://img.shields.io/badge/PocketMine-API%205-blue?style=for-the-badge">
    <img src="https://img.shields.io/badge/NG-PocketMine-Supported-success?style=for-the-badge">
    <img src="https://img.shields.io/badge/Minecraft-Bedrock-62B47A?style=for-the-badge&logo=minecraft">
    <img src="https://img.shields.io/badge/PHP-8+-777BB4?style=for-the-badge&logo=php">
</p>

---

### ✨ Features

| ✅ Feature | Description |
|------------|-------------|
| 🚫 Disable Place | Prevent placing specific blocks |
| ✋ Disable Use | Prevent using selected items |
| 📥 Disable Pickup | Block picking up disabled items |
| 📤 Disable Drop | Prevent dropping disabled items |
| 🎒 Disable Inventory | Remove or block disabled items |
| 🎨 Remove From Creative | Hide items from Creative Inventory |
| ⌨️ Block `/give` | Prevent players from obtaining disabled items |
| ⚙️ Fully Configurable | Enable or disable every protection |
| 💬 Custom Messages | Configure warning messages |
| ⚡ Lightweight | Optimized with minimal performance impact |

---

## 📦 Installation

1. Download **DisableItem.phar** from **Releases**.
2. Move it into the `plugins/` folder.
3. Restart your server.
4. Edit `config.yml`.
5. Enjoy!

---

## ⚙️ Configuration

```yaml
disabled-items:
  - TNT
  - Lava
  - Flint

block-place: true
block-use: true
block-pickup: true
block-drop: true
block-command: true
remove-creative: true

show-message: true
message: "This item is disabled."
```

---

## 📋 Supported Protections

| Protection | Supported |
|:----------:|:---------:|
| Place | ✅ |
| Use | ✅ |
| Pickup | ✅ |
| Drop | ✅ |
| Inventory | ✅ |
| Creative Inventory | ✅ |
| `/give` | ✅ |
| Configurable | ✅ |

---

## ❤️ Compatibility

| Software | Status |
|----------|--------|
| PocketMine-MP API 5 | ✅ |
| NG-PocketMine-MP | ✅ |

---

## 👨‍💻 Author

**haedarXD**

GitHub: **PM-haedarXD**

---

## 📄 License

This project is licensed under the **MIT License**.

⭐ If you like this project, consider leaving a **Star** on GitHub!

</div>
