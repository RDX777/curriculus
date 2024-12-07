import path from "path"

export const getCurrentFolderPath = () => {
  const currentFolderPath = path.resolve(process.cwd())

  return currentFolderPath
}
