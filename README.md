# Sample Plugin for Signalz

Create your own analyzers and data providers for the Signalz platform.

# Disclaimer

This trading application is provided as-is, without any guarantees or warranties. Trading and investing in financial instruments carry significant risk, and you may lose money. The data, tools, and features provided by this app are solely for informational and educational purposes. **You assume full responsibility for any decisions or actions taken as a result of using this application.**

The creators, contributors, and maintainers of this app disclaim any liability for financial losses, damages, or adverse outcomes resulting from its use. **Always perform your own due diligence and consult with a qualified financial advisor before making trading decisions.**

By using this app, you acknowledge and accept that all risks associated with trading are entirely your own.

## Creating a plugin
Note the Yaml file called plugin.yaml, this must contain an entry/controller pointing to a POPO file.
The file can be any valid php filename as long as it exist in the root of your project (ex: src/File.php)

You can not have any injected dependencies in the controller.

## License

This project is licensed under the MIT License. See `LICENSE` for details.

---
