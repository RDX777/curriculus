/** @type {import('next').NextConfig} */
const nextConfig = {
  experimental: {
    serverComponentsExternalPackages: ["ws", "socket.io-client", "socket.io"],
    missingSuspenseWithCSRBailout: false,
  },
  output: "standalone"
  //reactStrictMode: true
};

export default nextConfig;
