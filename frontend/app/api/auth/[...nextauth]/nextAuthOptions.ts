// @ts-nocheck
import { NextAuthOptions } from "next-auth";
import CredentialsProvider from "next-auth/providers/credentials";
import backEndInstance from "@/utils/configs/backEndInstance";

const nextAuthOptions: NextAuthOptions = {
  providers: [
    CredentialsProvider({
      name: "credentials",
      credentials: {
        username: { label: "username", type: "text" },
        password: { label: "password", type: "password" },
      },

      async authorize(credentials, req) {
        try {
          if (!credentials) {
            return null;
          }

          const dataCredentials = {
            username: req.body?.username,
            password: req.body?.password,
            groupToBring: process.env.AD_GROUP_SEARCH,
          };

          const responseUser = await backEndInstance.post(
            "auth/login",
            dataCredentials,
            {
              headers: {
                "Content-Type": "Application/json",
                Accept: "Application/json",
              },
            }
          );

          if (!responseUser && responseUser.status !== 200) {
            return null;
          }

          return responseUser.data.data;
        } catch (error) {
          console.error("nextAuthOptions.ts error");
          console.error(error);
        }
      },
    }),
  ],
  pages: {
    signIn: "/login",
  },
  callbacks: {
    async jwt({ token, user }) {
      user && (token.user = user);
      return token;
    },
    async session({ session, token }) {
      session = token as any;
      return session;
    },
  },
  secret: process.env.NEXTAUTH_SECRET,
};

export default nextAuthOptions;
