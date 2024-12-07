import * as forge from "node-forge";

export function encrypt(
  senha: string,
  chave: string = process.env.NEXT_PUBLIC_ADILUS_SECRET
    ? process.env.NEXT_PUBLIC_ADILUS_SECRET
    : ""
): string | undefined {
  try {
    const cipher = forge.cipher.createCipher("AES-CBC", chave);

    const iv = forge.random.getBytesSync(16);

    cipher.start({ iv: iv });
    cipher.update(forge.util.createBuffer(senha));
    cipher.finish();

    const ciphertext = cipher.output.getBytes();

    const combinedData = forge.util.createBuffer();
    combinedData.putBytes(iv);
    combinedData.putBytes(ciphertext);

    return combinedData.toHex();
  } catch (error) {
    console.error(error);
  }
}

// Função para descriptografar uma senha
export function decrypt(
  senhaCifrada: string,
  chave: string = process.env.NEXT_PUBLIC_ADILUS_SECRET
    ? process.env.NEXT_PUBLIC_ADILUS_SECRET
    : ""
): string {
  const combinedData = forge.util.createBuffer(
    forge.util.hexToBytes(senhaCifrada)
  );
  const iv = combinedData.getBytes(16);
  const ciphertext = combinedData.bytes();

  const decipher = forge.cipher.createDecipher("AES-CBC", chave);
  decipher.start({ iv: iv });
  decipher.update(forge.util.createBuffer(ciphertext));
  decipher.finish();

  return decipher.output.toString();
}
