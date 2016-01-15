/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Game.Network.ServerPacket
{
    public class PROTOCOL_BATTLE_3368_ACK : SendPacket
    {
        public override void WriteImpl()
        {
            WriteH(3369);
            WriteB(new byte[12]
            {
                (byte) 36,
                (byte) 0,
                (byte) 41,
                (byte) 13,
                (byte) 108,
                (byte) 6,
                (byte) 112,
                (byte) 23,
                (byte) 0,
                (byte) 0,
                (byte) 4,
                (byte) 17
          });
        }
    }
}
