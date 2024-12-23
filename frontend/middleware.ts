import { getToken } from "next-auth/jwt";
import { NextRequest, NextResponse } from "next/server";

export async function middleware(req: NextRequest) {
  const session = await getToken({
    req,
    secret: process.env.NEXTAUTH_SECRET,
  });

  if (!session) {
    return NextResponse.json(
      { error: "Unauthorized middleware" },
      { status: 401 }
    );
  }

  return NextResponse.next();
}

export const config = {
  matcher: [],
};
